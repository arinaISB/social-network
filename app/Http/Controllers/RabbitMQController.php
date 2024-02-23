<?php

namespace App\Http\Controllers;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQController extends Controller
{

    /**
     * @throws \Exception
     */
    public function publishMessage()
    {
//        dd(env('RABBITMQ_HOST'), env('RABBITMQ_USER'), env('RABBITMQ_PASSWORD'), env('RABBITMQ_VHOST'));
//        die;
//        $connection = new AMQPStreamConnection(env('RABBITMQ_HOST'),
//            5672,
//            env('RABBITMQ_USER'),
//            env('RABBITMQ_PASSWORD'),
//            env('RABBITMQ_VHOST'));
//        $channel = $connection->channel();
//        $channel->queue_declare('hello', false, false, false, false);
//        $msg = new AMQPMessage('Hello World!');
//        $channel->basic_publish($msg, '', 'hello');
//
//        echo " [x] Sent 'Hello World!'\n";
//
//        $channel->close();
//        $connection->close();
    }
}
