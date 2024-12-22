<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function getStores(){
        $user_id = auth()->user()->id;
        $stores =Stores::all();
        return response()->json([
            "messege"=> "the all Stores",
            "stores" => $stores
        ]);
    }
}
