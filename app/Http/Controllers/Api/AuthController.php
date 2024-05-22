<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // get user
        $user = User::where('email', $request->email)->first();

        // check user
        if (!$user){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        // check password
        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        //generate token
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);

    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'logout successfully',
        ]);
    }
}
