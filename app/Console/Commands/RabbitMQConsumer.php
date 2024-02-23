<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Command;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Consume email queue messages';

    /**
     * Execute the console command.
     * @throws \Exception
     */
    public function handle()
    {
        $connection = new AMQPStreamConnection(env('RABBITMQ_HOST'),
            5672,
            env('RABBITMQ_USER'),
            env('RABBITMQ_PASSWORD'),
            env('RABBITMQ_VHOST'));
        $channel = $connection->channel();
        $channel->queue_declare('email_queue', false, false, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            $userId = $msg->body;
            $user = User::findOrFail($userId);
            event(new Registered($user));
            echo ' [x] Email sent to ', $user, "\n";
        };

        $channel->basic_consume('email_queue', '', false, true, false, false, $callback);

        try {
            $channel->consume();
        } catch (\Throwable $exception) {
            echo $exception->getMessage();
        }
    }
}
