<?php
//
//namespace App\Console\Commands;
//
//use App\Models\User;
//use App\Services\RabbitMQService;
//use Illuminate\Auth\Events\Registered;
//use Illuminate\Console\Command;
//use Illuminate\Support\Facades\Log;
//
//class RabbitMQConsumer extends Command
//{
//    /**
//     * The name and signature of the console command.
//     *
//     * @var string
//     */
//    protected $signature = 'rabbitmq:consume {queue}';
//
//    /**
//     * The console command description.
//     *
//     * @var string
//     */
//    protected $description = 'Consume messages from a RabbitMQ queue';
//
//    /**
//     * Execute the console command.
//     * @throws \Exception
//     */
//    public function handle()
//    {
//        Log::info('1');
//
//        $queue = $this->argument('queue');
//
//        $rabbitMQService = new RabbitMQService();
//
//        $sendEmailCallback = function ($msg) {
//            $email = $msg->body;
//
//            Log::info('Processing message for user');
//
//            $user = User::where('email', $email)->firstOrFail();
//
//            event(new Registered($user));
//            echo ' [x] Email sent to ', $user, "\n";
//        };
//        $this->info("Consuming messages from the queue: {$queue}");
//        $rabbitMQService->consume($queue, $sendEmailCallback);
//    }
//}
