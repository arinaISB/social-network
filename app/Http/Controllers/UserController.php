<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Jobs\SendVerificationEmail;
use App\Models\User;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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

        SendVerificationEmail::dispatch($user)->onQueue('email');

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

            $lat = '55.44';
            $lon = '37.30';
            $appId = 'eb8b3f28b6ee398fdd56e0f734771b22';
            Log::info('1');
            $weather = WeatherService::extractWeatherData($lat, $lon, $appId);

            return view('main-page', [
                'userInfo'   => $userInfo,
                'followers'  => $followers,
                'following'  => $following,
                'postsCount' => $postsCount,
                'userPosts'  => $userPosts,
                'weather'    => $weather,
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
