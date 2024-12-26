<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function stores (){
    return $this->belongsTo(Store::class);
}

public function carts(){
    return $this ->belongsToMany(Cart::class);
}

public function favorites(){
    return $this ->belongsToMany(Favorite::class);
}
}
