<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/my-user', function (Request $request) {
    return $request->user();
});

//Route::post('register', [AuthController::class, 'register'])->name('register');
//Route::post('login', [AuthController::class, 'login'])->name('login');

//create a route group with auth:sanctum middleware
Route::group(['middleware' => 'auth:sanctum'], function () {
    //create a route group with admin role middleware
    Route::group(['middleware' => 'role:Administrador'], function () {
        Route::apiResource('users', UserController::class);
    });

    Route::apiResource('tasks', TaskController::class);
});
