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

    public function getTypesByStore($store_id){
        $types = Book::where('store_id',$store_id)->get(['type']);
        return response()->json([
            "message"=>"the all types of one store",
            "data" => $types,
        ]);
    }

    public function getBooksByType($type){
        $books = Book::where('type',$type)->get();
        return response()->json([
            "message"=>"the all books of one type in a one store",
            "data" => $books,
        ]);
        return response()->json([
            "message" => "the all books of one type in a one store",
            "data" => [
                "name" => $book->name,
                "image" => $book->image,
            ]
        ]);
    }

    public function getBookDetail($book_id){
        $book = Book::where('id',$book_id)->first();
        return response()->json([
            "message" => "The book details",
            "data" => [
                "name" => $book->name,
                "author" => $book->author,
                "price" => $book->price,
                "ratings" => $book->ratings,
                "image" => $book->image,
                "details" => $book->details,
            ]
        ]);
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


    public function confirmtCart($cart_id){
        $cart = Cart::find($cart_id);
        if(!$cart){
            return response()->json([
                'messege' => 'Cart not found'
            ], 404);
        }
        $cart->status = 'done';
        $cart->save();
        $books = $cart->books()->get();
        foreach($books as $book){
            $book->amount =$book->amount -1;
            $book->save();
        }
        return response()->json([
            'messege' => 'the status of cart changed to done',
            'messege2' => 'the book amounts decrease 1'
        ]);
    }

}
