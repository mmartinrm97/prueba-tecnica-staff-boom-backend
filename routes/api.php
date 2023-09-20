<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTaskController;
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

Route::prefix('auth')->middleware(['api'])->group(function () {

    Route::post('signup', [AuthController::class, 'signup'])->name('auth.signup');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/password/email', [AuthController::class, 'sendPasswordResetLinkEmail'])->middleware('throttle:5,1')->name('password.email');
    Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.reset');

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::get('user', [AuthController::class, 'getAuthenticatedUser'])->name('auth.user');
    });

});


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::group(['middleware' => 'admin'], function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('tasks', TaskController::class)->only(['index', 'show']);

    });

    Route::apiResource('users.tasks', UserTaskController::class)->scoped();

});


