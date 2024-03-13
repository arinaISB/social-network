<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', [AuthController::class, 'login']);
Route::get('login', function () {
    \Illuminate\Support\Facades\Log::info('get api login page');
    return view('auth.login');
});

//
//Route::middleware('auth:api')->group(function () {
//    Route::post('post/like/{postId}', [LikeController::class, 'like'])->name('api.post.like');
//    Route::post('comments/create/{postId}', [CommentController::class, 'create'])->name('api.comments.create');
//});

