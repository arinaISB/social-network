<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountSettingsRequest;
use App\Models\Information;
use Illuminate\Support\Facades\Auth;
use http\Exception\InvalidArgumentException;

class AccountSettingsController extends Controller
{
    public function show()
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

        return redirect("main-page")->withSuccess('Profile updated successfully.');
    }
}
