<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role'=>['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('authToken')->plainTextToken;
          

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token,
                'role' => $user->role,
            ], 200);
            
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
