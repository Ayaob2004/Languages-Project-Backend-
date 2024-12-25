<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name'=>'required|String|max:50',
            'last_name'=>'required|String|max:50',
            'phone'=>'required|max:10|unique:users,phone',
            'password'=>'required|String|min:8|confirmed'
        ]);
        $user = User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message'=>'user registerd successfully',
            'User'=>$user,
            'token'=>$token
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



    public function addProfileImage(Request $request)
    {
    $user = Auth::user();
    $user_img = $user->image; // Get the current image path from the user
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('profile_images'), $filename);
        if ($user_img) {
            $oldImagePath = public_path('profile_images/' . $user_img);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }
        }
        $user->image = $filename;
    }
    $user->save(); // This should work now
    return response()->json([
        'message' => 'Profile updated successfully',
        'user' => $user,
    ]);
    }



    public function addOrUpdateAddress(Request $request)
    {
    $user = Auth::user();
    $request->validate([
        'address' => 'required|string|max:255',
    ]);
    $user->address = $request->input('address');
    $user->save();
    return response()->json([
        'message' => 'Address updated successfully',
        'user_address' => $user->address,
    ], 200);
    }

}
