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
        return response()->json([
            "messege"=> "the all Stores",
            "stores" => $stores
        ]);
    }

    public function getAllTypes()
    {
        $types = Book::select('type')->distinct()->pluck('type');
        return response()->json($types);
    }


    public function getBooksByStoreAndType($store_id, $type)
    {
        $books = Book::whereHas('stores', function ($query) use ($store_id) {
                $query->where('stores.id', $store_id);
            })
            ->where('type', $type)
            ->select('name', 'image', 'author', 'price')
            ->get();
        return response()->json($books);
    }

    public function getBookDetail($book_id)
    {
        $book = Book::where('id', $book_id)
        ->select('name', 'author', 'image', 'price', 'ratings', 'details')
        ->first();
        if ($book) {
            return response()->json([
                "message" => "The book details",
                "data" => $book
            ]);
        } else {
            return response()->json([
                "message" => "Book not found",
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
