<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = ['id'];

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'book_store');
    }

    public function carts()
    {
        return $this ->belongsToMany(Cart::class);
    }

    public function favorites()
    {
        return $this ->belongsToMany(Favorite::class, 'favorite__book')->withTimestamps();
    }
}
