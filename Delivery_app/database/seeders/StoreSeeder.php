<?php

namespace Database\Seeders;

use App\Models\Store;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{

    public function run(): void
    {
        //1
        DB::table("stores")->insert([
            "name"=>"Love&Other Books",
            "image"=>"/stores_images/Love&Other_Books.jpg"
        ]);
        //2
        DB::table("stores")->insert([
            "name"=>"Coffee Books",
            "image"=>"/stores_images/Coffee_Books.jpg"
        ]);
        //3
        DB::table("stores")->insert([
            "name"=>"The Lvy Bookshop",
            "image"=>"/stores_images/The_Lvy_Bookshop.jpg"
        ]);
        //4
        DB::table("stores")->insert([
            "name"=>"The Corner Bookstore",
            "image"=>"/stores_images/The_Corner_Bookstore.jpg"
        ]);
        //5
        DB::table("stores")->insert([
            "name"=>"The Island Bookshop",
            "image"=>"/stores_images/The_Island_Bookshop.jpg"
        ]);
        //6
        DB::table("stores")->insert([
            "name"=>"Lost City Books",
            "image"=>"/stores_images/Lost_City_Books.jpg"
        ]);
    
    }
}
