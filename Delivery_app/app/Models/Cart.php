<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    protected $attributes = [
        'status' => 'pending', // Default value
    ];

    public function users(){
        return $this->belongsTo(User::class);

    }
    public function books(){
        return $this->belongsToMany(Book::class);

    }
}
