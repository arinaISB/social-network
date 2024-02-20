<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.layouts');
});

Route::get('register', [UserController::class, 'registration'])->name('register');
Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
Route::get('logout', [UserController::class, 'logOut'])->name('logout');

Route::get('main-page', [UserController::class, 'mainPage'])->name('main.page');

Route::post('create-post', [PostController::class, 'create'])->name('post.create');

Route::get('account-settings', [AccountSettingsController::class, 'accountSettings'])->name('account.settings');
Route::post('account-settings', [AccountSettingsController::class, 'saveAccountSettings'])->name('account.settings.save');


