<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class UserAuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = strtolower($request->input('email'));
        $password = $request->input('password');
        $isAdmin = $request->input('isAdmin');
        $adminPassword = $request->input('adminPassword');

        // On vérifie, si l'utilisateur veut s'inscrire en admin, qu'il aie bien mis le mot de passe
        if ($isAdmin) {
            if ($adminPassword != "ewX9EjHwldCUuHl") {
                return response()->json(['message' => 'Error: invalid admin password']);
            }
        }
        
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'isAdmin' => $isAdmin,
            'adminPassword' => $adminPassword
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User Account Created Successfully',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $email = strtolower($request->input('email'));
        $password = $request->input('password');

        $credentials = [
            'email' => $email,
            'password' => $password
        ];
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid login credentials'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ],200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Succesfully Logged out'
        ], 200);
    }
}
