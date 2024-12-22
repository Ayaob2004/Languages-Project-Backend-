<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);
Route::post('logout',[UserController::class, 'logout'])->middleware('auth:sanctum');
Route::post('addProfileImage',[UserController::class ,'addProfileImage']);
Route::post('addUserAddress',[UserController::class ,'addUserAddress']);

