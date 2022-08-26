<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response(['message' => 'The user has been authenticated successfully'], 200);
        }
        return response(['message' => 'The provided credentials do not match our records.'], 401);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return response(['message' => 'The user has been logged out successfully'], 200);
    }

    public function register(Request $request){
        $requestData = $request->validate([
            'name' => 'required|string|max:45',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password']),
            'role' => 'user'
        ]);

        $user->save();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return response(['message' => 'The user has been registered successfully'], 200);
        }
        return response(['message' => 'The provided credentials do not match our records.'], 401);
    }
}

