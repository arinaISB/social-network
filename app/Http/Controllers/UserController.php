<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function customLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            return redirect()->intended('main-page')->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function customRegistration(RegistrationRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $connection = new AMQPStreamConnection(env('RABBITMQ_HOST'),
            5672,
            env('RABBITMQ_USER'),
            env('RABBITMQ_PASSWORD'),
            env('RABBITMQ_VHOST'));
        $channel = $connection->channel();
        $channel->queue_declare('email_queue', false, false, false, false);

        $msg = new AMQPMessage("{$user->id}");
        $channel->basic_publish($msg, '', 'email_queue');

        $channel->close();
        $connection->close();

//        Auth::login($user);

        return redirect("login")->withSuccess('You have signed-in. Please check your email to verify your account.');
    }

    public function mainPage()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $userInfo = $user->information;

            $followers = $user->followers()->count();
            $following = $user->following()->count();

            $userPosts = $user->posts()->orderBy('created_at', 'desc')->get();
            $postsCount = $userPosts->count();

            return view('main-page', [
                'userInfo'   => $userInfo,
                'followers'  => $followers,
                'following'  => $following,
                'postsCount' => $postsCount,
                'userPosts'  => $userPosts,
                ]);
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function logOut()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
