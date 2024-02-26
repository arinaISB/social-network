<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQService
{
    protected AMQPStreamConnection $connection;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            5672,
            env('RABBITMQ_USER'),
            env('RABBITMQ_PASSWORD'),
            env('RABBITMQ_VHOST')
        );
    }

    public function publish(string $queueName, string $message): void
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queueName, false, false, false, false);

        $msg = new AMQPMessage($message);
        $channel->basic_publish($msg, '', $queueName);

        $channel->close();
    }

    public function consume(string $queueName, callable $callback): void
    {
        $channel = $this->connection->channel();
        $channel->queue_declare($queueName, false, false, false, false);

//        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $channel->basic_consume($queueName, '', false, true, false, false, $callback);
        $channel->close();
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}
