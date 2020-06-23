<?php


namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
Use App\User;

class AuthController extends Controller
{
    
    public function register(REQUEST $request)
    {
        $validData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $validData['password'] = Hash::make($validData['password']);
    
        $user = User::create($validData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'accessToken' => $accessToken]);
    }

    public function login(REQUEST $request)
    {
        $loginData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(!auth()->attempt($loginData))
        {
            return response(['message' => 'Invalid login data']);
        }

        $accessToken = $request->user()->createToken('authToken')->accessToken;

        return response(['user' => $request->user(), 'accessToken' => $accessToken]);
    }

}
