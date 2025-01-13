<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        return 'test';
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate the admin
        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            $admin = Auth::guard('web')->user();

            // Generate a token (using Laravel Sanctum)
            $token = $admin->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Logged in successfully.',
                'token' => $token,
                'admin' => $admin,
            ], 200)->cookie('auth_token', $token, 60 * 24, null, null, true, true);
        }

        // If authentication fails
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password.',
        ], 401);
    }

    public function logout(Request $request)
    {
        // return $request->user();
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out successfully'], 200);
        }

        // Handle cases where the user is not authenticated
        return response()->json(['message' => 'No authenticated user found'], 401);
    }
}
