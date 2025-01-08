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
            ->select('name', 'image', 'author', 'price', 'type')
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



    public function search($search){
        $results = Store::where('name', 'like', "%$search%")->get();
        $results2 = Book::where('name', 'like', "%$search%")->get();
        return response()->json([
            'messege' => 'the search results',
            'Stores' => $results,
            'Books' => $results2
        ]);
    }


}
