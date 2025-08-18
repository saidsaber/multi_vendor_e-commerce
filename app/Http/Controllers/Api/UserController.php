<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Trait\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:8'
        ]);
        $user = User::create($validation);
        $token = $user->createToken("apiToken", ['web'])->plainTextToken;
        return ApiResponse::success(['token' => $token]);
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return ApiResponse::error(['error' => 'Invalid credentials']);
        }

        if ($user->role != 'web') {
            return ApiResponse::error(['error' => 'Invalid credentials']);
        }
        
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken("apiToken", ['web'])->plainTextToken;
            return ApiResponse::success(['token' => $token]);
        }
        return ApiResponse::error(['error' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        // $request->user()->currentAccessToken()->delete();
        $request->user()->tokens()->delete();
        return ApiResponse::success(['massage' => 'logged out']);
    }
}
