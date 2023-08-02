<?php

use App\Http\Controllers\Admin\LikeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Auth\PasswordForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Me\MeController;
use App\Http\Controllers\Subscription\SubscribeController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/me', [MeController::class, 'show']);
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/subscribe', SubscribeController::class);
    
    //Roles and Permissions
    //TODO: Terminar o crud de cadastro de grupo de usuários
    Route::get('/group-users', [RoleController::class, 'index']);
    Route::post('/groups', [RoleController::class, 'store']);
});




//Auth
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);
Route::post('register', RegisterController::class);
Route::post('verify-email', VerifyEmailController::class);
Route::post('forgot-password', PasswordForgotController::class);
Route::post('reset-password', PasswordResetController::class);

//Admin Posts / likes
Route::apiResource('posts', PostController::class);
Route::post('like/{post}', [LikeController::class, 'likeIt']);
Route::delete('like/{post}', [LikeController::class, 'unlikeIt']);