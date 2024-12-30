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
        // Get or create the favorite list for the user
        $favorite = $user->favorite()->firstOrCreate([]);
        // Check if the book is already in favorites
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
            $books = $favorite->books; // Get all books in the favorite list
            return response()->json($books);
        }
        return response()->json(['message' => 'No favorite list found.'], 404);
    }

    
}
