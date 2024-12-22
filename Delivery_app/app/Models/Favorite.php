<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function users(){
        return $this ->belongsTo(User::class);
    }

    public function books(){
        return $this ->belongsToMany(Book::class);
    }
}
