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
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $book = Book::find($bookId);
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }
        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id, 'status' => 'pending'],
            ['cost' => 0]
        );
        if (!$cart->books->contains($bookId)) {
            $cart->books()->attach($bookId);
        }
        $totalCost = $cart->books->sum(function ($book) {
            return $book->price;
        });
        $cart->cost = $totalCost;
        $cart->save();
        return response()->json(['message' => 'Book added to cart successfully', 'cart' => $cart], 200);
    }

    public function getCart($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->first();
        if (!$cart) {
            return response()->json(['message' => 'Cart not found or unauthorized'], 404);
        }
        return response()->json([
            'message' => 'Cart retrieved successfully',
            'cart' => $cart
        ], 200);
    }

    public function getAllCarts()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        if ($carts->isEmpty()) {
            return response()->json(['message' => 'No carts found for this user'], 404);
        }
        return response()->json([
            'message' => 'Carts retrieved successfully',
            'carts' => $carts
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

    public function updateCart(Request $request, $id)
    {
        $cart = Cart::where('id', $id)->where('user_id', Auth::id())->first();
        if (!$cart) {
            return response()->json(['message' => 'Cart not found or unauthorized'], 404);
        }
        $request->validate([
            'cost' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:pending,done',
        ]);
        $cart->update($request->only(['cost', 'status']));
        return response()->json([
            'message' => 'Cart updated successfully',
            'cart' => $cart
        ], 200);
    }

    public function confirmtCart($cart_id){
        $cart = Cart::find($cart_id);
        if(!$cart){
            return response()->json([
                'messege' => 'Cart not found'
            ], 404);
        }
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
