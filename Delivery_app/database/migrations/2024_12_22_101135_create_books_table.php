<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->string('price');
            $table->string('image');
            $table->integer('amount');
            $table->string('ratings');
            $table->longText('details');
            $table->enum('type', ['novels' ,'children', 'culture', 'literary', 'scientific']);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
