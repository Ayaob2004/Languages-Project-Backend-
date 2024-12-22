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


Route::middleware('auth:sanctum')->group(function(){

    Route::post('logout',[UserController::class, 'logout']);
    Route::post('addProfileImage',[UserController::class ,'addProfileImage']);
    Route::post('addUserAddress',[UserController::class ,'addUserAddress']);
    Route::get('getStores',[StoreController::class ,'getStore']);
    Route::get('getBooksByStore/{store_id}',[StoreController::class ,'getStore']);
    Route::get('getBookDetail/{book_id}',[StoreController::class ,'getBookDetail']);


});


