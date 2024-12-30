<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
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
    Route::delete('deleteProfileImage',[UserController::class, 'deleteProfileImage']);
    Route::post('address',[UserController::class ,'addOrUpdateAddress']);
    Route::get('getUserInfo',[UserController::class ,'getUserInfo']);

    Route::get('stores',[StoreController::class ,'getStores']);
    Route::get('types',[StoreController::class ,'getAllTypes']);
    Route::get('books/{store_id}/{type}',[StoreController::class ,'getBooksByStoreAndType']);
    Route::get('bookDetail/{book_id}',[StoreController::class ,'getBookDetail']);


    Route::get('search/{search}',[StoreController::class ,'search']);
    Route::get('confirmtCart/{cart_id}',[StoreController::class ,'confirmtCart']);

    Route::post('createCart',[CartController::class, 'createCart']);
    Route::post('updateCart/{cart_id}',[CartController::class, 'updateCart']);
    Route::post('addBookToCart/{cart_id}/{book_id}',[CartController::class, 'addBookToCart']);
    Route::delete('deleteCart/{cart_id}',[CartController::class, 'deleteCart']);
    Route::get('getCart/{cart_id}',[CartController::class, 'getCart']);
    Route::get('getAllCarts',[CartController::class, 'getAllCarts']);

    Route::post('/favorites/add/{bookId}', [FavoriteController::class, 'addBookToFavorite']);
    Route::post('/favorites/remove/{bookId}', [FavoriteController::class, 'removeBookFromFavorite']);
    Route::get('/favorites', [FavoriteController::class, 'getAllFavorite']);

});