<?php

namespace App\Http\Controllers;


use App\Models\Store;
use App\Models\User;
use App\Models\Book;
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

    public function getBooksByStore($store_id){
        $books = Book::where('store_id',$store_id)->get(['id',"name","image"]);
        return response()->json([
            "message"=>"the all books of one store",
            "data" => $books,
        ]);
    }

    public function getBookDetail($book_id){

        $book = Book::where('id',$book_id)->get();
        return response()->json([
            "message" => " the book details",
            "data" => $book
        ]);
    }
}
