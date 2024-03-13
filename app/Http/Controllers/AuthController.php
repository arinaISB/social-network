<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $token = auth()->user()->createToken('API Token')->plainTextToken;
            Log::info('User logged in successfully. Token: ' . $token);

            return response()->json([
                'url' => 'feed',
                'token' => $token
            ]);
        }

        Log::error('Failed login attempt.');
        return response()->json(['error' => 'Unauthorized']);
    }
}
