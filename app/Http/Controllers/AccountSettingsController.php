<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountSettingsRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    public function showAccountSettings()
    {
        $user = Auth::user();
        $userInfo = $user->information;
        return view('account-settings', [
            'user'      => $user,
            'userInfo' => $userInfo,
        ]);
    }

    public function saveAccountSettings(AccountSettingsRequest $request)
    {
        $validatedData = $request->validated();

        $user = Auth::user();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'] ?? $user->phone;
        $user->save();

        $information = $user->information ?? new Information();
        $information->user_id = $user->id;
        $information->status = $validatedData['status'];
        $information->job = $validatedData['job'];
        $information->city = $validatedData['city'];
        $information->hobby = $validatedData['hobby'];

        if ($information->exists) {
            $information->save();
        } else {
            $user->information()->save($information);
        }

        return back()->withSuccess('Profile updated successfully.');
    }
}
