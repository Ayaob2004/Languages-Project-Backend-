<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addBookToCart($bookId)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $cart = $user->carts()->where('status', 'pending')->first();
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'cost' => 0, // Initially set the cost to 0
            ]);
        }
        $book = Book::find($bookId);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $cart->books()->attach($bookId);
        $totalCost = $cart->books->sum('price');
        $cart->update(['cost' => $totalCost]);
        return response()->json([
            'message' => 'Book added to cart successfully',
            'total_cost' => $totalCost
        ], 200);
    }

    public function deleteBookFromCart($bookId)
    {
        $user = Auth::user();
        $cart = $user->carts()->where('status', 'pending')->first();
        if (!$cart) {
            return response()->json(['message' => 'No pending cart found'], 404);
        }
        if (!$cart->books->contains($bookId)) {
            return response()->json(['message' => 'Book not found in cart'], 404);
        }
        $cart->books()->detach($bookId);
        $cart->load('books');
        $totalCost = $cart->books->sum('price');
        $cart->update(['cost' => $totalCost]);
        return response()->json([
            'message' => 'Book removed from cart successfully',
            'total_cost' => $totalCost
        ], 200);
    }

    public function getBooksInPendingCart()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $cart = $user->carts()->where('status', 'pending')->first();
        if (!$cart) {
            return response()->json(['message' => 'No pending cart found'], 404);
        }

        $books = $cart->books;
        $translatedBooks = $books->map(function ($book) {
            $book->name = __($book->name);
            $book->type = __($book->type);
            $book->author = __($book->author);
            return $book;
        });


        return response()->json([
            'message' => 'Books retrieved successfully',
            'books' => $translatedBooks,
            'total_cost' => $cart->cost,
        ], 200);
    }

    public function getPendingCart()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $cart = $user->carts()->where('status', 'pending')->first();
        if (!$cart) {
            return response()->json(['message' => 'No pending cart found'], 404);
        }

        $books = $cart->books;
        $translatedBooks = $books->map(function ($book) {
            $book->name = __($book->name);
            $book->type = __($book->type);
            $book->author = __($book->author);
            $book->details = __($book->details);
            return $book;
        });

        return response()->json([
            'message' => 'Pending cart retrieved successfully',
            'cart' => [
                'id' => $cart->id,
                'total_cost' => $cart->cost,
                'books' => $translatedBooks
            ]
        ], 200);
    }

    public function getDoneCarts()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $cart = $user->carts()->where('status', 'done')->first();
        if (!$cart) {
            return response()->json(['message' => 'No done cart found'], 404);
        }

        $books = $cart->books;
        $translatedBooks = $books->map(function ($book) {
            $book->name = __($book->name);
            $book->type = __($book->type);
            $book->author = __($book->author);
            $book->details = __($book->details);
            return $book;
        });

        return response()->json([
            'message' => 'done cart retrieved successfully',
            'cart' => [
                'id' => $cart->id,
                'total_cost' => $cart->cost,
                'books' => $translatedBooks
            ]
        ], 200);
    }


    public function deleteCart($cart_id)
    {
        $cart = Cart::where('id', $cart_id)->where('user_id', Auth::id())->first();
        if (!$cart) {
            return response()->json(['message' => 'Cart not found or unauthorized'], 404);
        }
        $cart->delete();
        return response()->json(['message' => 'Cart deleted successfully'], 200);
    }


    public function confirmtCart(){
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $cart = $user->carts()->where('status', 'pending')->first();
        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }
        // $cart = Cart::find($cart_id);
        // if(!$cart){
        //     return response()->json([
        //         'messege' => 'Cart not found'
        //     ], 404);
        // }
        $cart->status = 'done';
        $cart->save();
        $books = $cart->books()->get();
        foreach($books as $book){
            $book->amount =$book->amount -1;
            $book->save();
        }
        return response()->json([
            'messege' => 'the status of cart changed to done',
            'messege2' => 'the book amounts decrease 1'
        ]);
    }
}
