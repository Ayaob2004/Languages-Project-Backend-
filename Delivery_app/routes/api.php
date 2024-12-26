<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\StoreController;
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
    Route::post('address',[UserController::class ,'addOrUpdateAddress']);


    Route::get('getStores',[StoreController::class ,'getStores']);
    Route::get('getTypesByStore/{store_id}',[StoreController::class ,'getTypesByStore']);
    Route::get('getBooksByType/{type}',[StoreController::class ,'getBooksByType']);
    Route::get('getBookDetail/{book_id}',[StoreController::class ,'getBookDetail']);
    Route::get('search/{search}',[StoreController::class ,'search']);
    Route::get('confirmtCart/{cart_id}',[StoreController::class ,'confirmtCart']);


    Route::post('createCart',[CartController::class, 'createCart']);
    Route::post('updateCart/{cart_id}',[CartController::class, 'updateCart']);
    Route::post('addBookToCart/{cart_id}/{book_id}',[CartController::class, 'addBookToCart']);
    Route::delete('deleteCart/{cart_id}',[CartController::class, 'deleteCart']);
    Route::get('getCart/{cart_id}',[CartController::class, 'getCart']);
    Route::get('getAllCarts',[CartController::class, 'getAllCarts']);


});