<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
           'first_name'=>'required|String|max:50',
           'last_name'=>'required|String|max:50',
           'phone'=>'required|max:10',
           'password'=>'required|String|min:8|confirmed', 
           'email'=>'required|String|max:200|unique:users,email',
        ]);
        $user = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'email'=>$request->email,
        ]);
        return response()->json([
            'message'=>'user registerd successfully',
            'User'=>$user
        ], 201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'phone'=>'required|max:10',
            'password'=>'required|String' 
        ]);
        if(!Auth::attempt($request->only('phone','password'))){
            return response()->json([
                'message'=>'invalid phone or password'
            ], 401);
        }
        $user = User::where('phone', $request->phone)->FirstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'=>'login successfully',
            'User'=>$user,
            'Token'=> $token
        ], 201);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'logout successful'
        ]);
    }
}
