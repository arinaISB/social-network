<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Jobs\SendVerificationEmail;
use App\Models\User;
use App\Services\ImageService;
use App\Services\WeatherGeoService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;


//            return redirect()->intended('feed')->with('token', $token);
//            return redirect()->intended('main-page')->withSuccess('Signed in');
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

        DB::transaction(function () use ($validated)
        {
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            SendVerificationEmail::dispatch($user)->onQueue('email');
        });

        return redirect("login")->withSuccess('You have signed-in. Please check your email to verify your account.');
    }

    public function mainPage(WeatherGeoService $weatherGeoService)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $userInfo = $user->information;

            $followers = $user->followers()->count();
            $following = $user->following()->count();

            $userPosts = $user->posts()->orderBy('created_at', 'desc')->get();
            $postsCount = $userPosts->count();

            $cityUser = $user->information->city ?? null;

            if ($cityUser)
            {
                $weather =  $weatherGeoService->getWeatherDataByCityName($cityUser);
            }

            return view('main-page', [
                'userInfo'   => $userInfo,
                'followers'  => $followers,
                'following'  => $following,
                'postsCount' => $postsCount,
                'userPosts'  => $userPosts,
                'weather'    => $weather ?? null,
                ]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function uploadAvatar(AvatarRequest $request, ImageService $imageService)
    {
        $validated = $request->validated();

        $success = $imageService->uploadAvatar($validated['image'], Auth::id());

        if ($success) {
            return back()->with('success', 'Image uploaded successfully');
        } else {
            return back()->with('error', 'Failed to upload image');
        }
    }

    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
