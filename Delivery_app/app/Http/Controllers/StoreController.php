<?php

namespace App\Http\Controllers;


use App\Models\Store;
use App\Models\User;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class StoreController extends Controller
{
    public function getStores(){
        $stores = Store::all();

        $translatedStores = $stores->map(function ($store) {
            $store->name = __($store->name);
            return $store;
        });

        return response()->json([
            'message' => __('store_name'),
            'stores' => $translatedStores,
        ]);
    }


    public function getAllTypes(){
        $types = Book::select('type')->distinct()->pluck('type');

        $translatedTypes = $types->map(function ($type) {
            return __($type);
        });

        return response()->json($translatedTypes);
    }


    public function getBooksByStoreAndType($store_id, $type){
        $books = Book::whereHas('stores', function ($query) use ($store_id) {
                $query->where('stores.id', $store_id);
            })
            ->where('type', $type)
            ->select('id','name', 'image', 'author', 'price', 'type')
            ->get();

        $translatedBooks = $books->map(function ($book) {
            $book->name = __($book->name);
            $book->type = __($book->type);
            $book->author = __($book->author);
            return $book;
        });

        return response()->json($translatedBooks);
    }

    public function getBookDetail($book_id){
        $book = Book::where('id', $book_id)
            ->select('id','name', 'author', 'image', 'price', 'ratings', 'details', 'type')
            ->first();

        if ($book) {
            $book->name = __($book->name);
            $book->details = __($book->details);
            $book->type = __($book->type);
            $book->author = __($book->author);

            return response()->json([
                "message" => __("The book details"),
                "data" => $book
            ]);
        } else {
            return response()->json([
                "message" => __("Book not found"),
                "data" => null
            ], 404);
        }
    }

    public function getBookCountInCart($bookId)
    {
        $user = Auth::user();
        $cart = $user->carts()->where('status', 'pending')->first();
        if (!$cart) {
            return response()->json([
                'message' => 'No pending cart found',
                'book_count_in_cart' => 0
            ], 200);
        }
        $bookCountInCart = $cart->books()->where('book_id', $bookId)->count();
        return response()->json([
            'message' => 'Book count in cart retrieved successfully',
            'book_count_in_cart' => $bookCountInCart
        ], 200);
    }

    public function search($search){
        $stores = Store::where('name', 'like', "%$search%")->get();
        $books = Book::where('name', 'like', "%$search%")->get();

        $translatedBooks = $books->map(function ($book) {
            $book->name = __($book->name);
            $book->type = __($book->type);
            $book->author = __($book->author);
            $book->details = __($book->details);
            return $book;
        });

        $translatedStores = $stores->map(function ($store) {
            $store->name = __($store->name);
            return $store;
        });

        return response()->json([
            'messege' => 'the search results',
            'Stores' => $translatedStores,
            'Books' => $translatedBooks
        ]);
    }


}
