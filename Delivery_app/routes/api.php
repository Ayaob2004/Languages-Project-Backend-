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

    Route::prefix('cart')->group(function () {
        Route::post('addBook/{bookId}', [CartController::class, 'addBookToCart']);  
        Route::delete('removeBook/{bookId}', [CartController::class, 'deleteBookFromCart']); 
        Route::get('pending', [CartController::class, 'getPendingCart']);  
        Route::get('done', [CartController::class, 'getDoneCarts']);
        Route::get('confirm',[CartController::class ,'confirmtCart']);
        Route::delete('delete/{cart_id}',[CartController::class, 'deleteCart']);
    });

    Route::prefix('favorites')->group(function(){
        Route::post('/add/{bookId}', [FavoriteController::class, 'addBookToFavorite']);
        Route::post('/remove/{bookId}', [FavoriteController::class, 'removeBookFromFavorite']);
        Route::get('/', [FavoriteController::class, 'getAllFavorite']);
    });


});