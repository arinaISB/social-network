<?php

use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    \Illuminate\Support\Facades\Log::info('home page and redirect to login page from web.php');
    return view('auth.login');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [UserController::class, 'registration'])->name('register');
    Route::post('custom-registration', [UserController::class, 'customRegistration'])->name('register.custom');
//    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('custom-login', [UserController::class, 'customLogin'])->name('login.custom');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [UserController::class, 'logOut'])->name('logout');
    Route::get('main-page', [UserController::class, 'mainPage'])->name('main.page')->middleware('verified');
    Route::get('feed', [FeedController::class, 'show'])->name('feed')->middleware('verified');
    Route::post('create-post', [PostController::class, 'create'])->name('post.create')->middleware('verified');
    Route::get('account-settings', [AccountSettingsController::class, 'show'])->name('account.settings')->middleware('verified');
    Route::post('account-settings', [AccountSettingsController::class, 'saveAccountSettings'])->name('account.settings.save')->middleware('verified');
    Route::post('post-like/{postId}', [LikeController::class, 'like'])->name('post.like')->middleware('verified');
    Route::patch('post-edit/{postId}', [PostController::class, 'edit'])->name('post.edit')->middleware('verified');
    Route::post('post-comment/{postId}', [CommentController::class, 'create'])->name('comments.create')->middleware('verified');
    Route::get('weather', [UserController::class, 'mainPage'])->name('weather')->middleware('verified');
    Route::post('upload-image', [UserController::class, 'uploadAvatar'])->name('upload.image')->middleware('verified');
    Route::get('comments', [CommentController::class, 'getAll'])->name('comments')->middleware('verified');
    Route::get('avatar', [UserController::class, 'getAvatar'])->name('avatar')->middleware('verified');

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('main.page');
    })->name('verification.verify')->middleware('signed');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->name('verification.send')->middleware('throttle:6,1');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
