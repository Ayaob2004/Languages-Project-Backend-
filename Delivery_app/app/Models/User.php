<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'password',
        'email'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function carts(){
        return $this ->hasMany(Cart::class);
    }

    public function favorites(){
        return $this ->hasOne(Favorite::class);
    }
}
