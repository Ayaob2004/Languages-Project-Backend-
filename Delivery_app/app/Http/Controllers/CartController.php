<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function createCart(Request $request)
    {
        $request->validate([
            'cost' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:pending,done',
        ]);
        $cart = Cart::create([
            'user_id' => Auth::id(),
            'cost' => $request->input('cost'),
            'status' => $request->input('status', 'pending'),
        ]);
        return response()->json([
        'message' => 'Cart created successfully',
        'cart' => $cart
        ], 201);
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


    public function addBookToCart($cart_id, $book_id)
    {
        $cart = Cart::where('id', $cart_id)->where('user_id', Auth::id())->first();
        if (!$cart) {
            return response()->json(['message' => 'Cart not found or unauthorized'], 404);
        }
        $book = Book::find($book_id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        $cart->books()->attach($book_id);
        return response()->json([
            'message' => 'Book added to cart successfully',
            'cart' => $cart->load('books') 
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
}
