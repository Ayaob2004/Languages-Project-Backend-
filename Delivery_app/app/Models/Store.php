<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Store extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_store');
    }


}
