<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addBookToFavorite($bookId)
    {
        $user = Auth::user();
        $book = Book::findOrFail($bookId);
        $favorite = $user->favorite()->firstOrCreate([]);
        if (!$favorite->books()->where('book_id', $bookId)->exists()) {
            $favorite->books()->attach($bookId);
            return response()->json(['message' => 'Book added to favorites successfully.']);
        }
        return response()->json(['message' => 'Book is already in favorites.'], 400);
    }

    public function removeBookFromFavorite($bookId)
    {
        $user = Auth::user();
        $favorite = $user->favorite;
        if ($favorite && $favorite->books()->where('book_id', $bookId)->exists()) {
            $favorite->books()->detach($bookId);
            return response()->json(['message' => 'Book removed from favorites successfully.']);
        }
        return response()->json(['message' => 'Book is not in favorites.'], 400);
    }


    public function getAllFavorite()
{
    $user = Auth::user();
    $favorite = $user->favorite;

    if ($favorite) {
        $books = $favorite->books->map(function ($book) {
            return [
                'id' => $book->id,
                'name' => __($book->name),
                'author' => __($book->author),
                'price' => $book->price,
                'image' => $book->image,
                'ratings' => $book->ratings,
                'details' => __($book->details),
                'type' => __($book->type)
            ];
        });
        return response()->json([
            'message' => 'favorite_list_message',
            'books' => $books,
        ]);
    }
    return response()->json(['message' => 'No favorite list found.'], 404);

}
}
