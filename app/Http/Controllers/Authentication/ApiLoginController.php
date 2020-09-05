<?php

namespace App\Http\Controllers\Authentication;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ApiLoginController extends Controller
{
    public function __construct() {

    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'message' => 'The provided credentials are not correct'
            ]);
        }

        return response(['token' => $user->createToken('Laravel Password Grant Client')->accessToken], 200);
    }

    /**
     * Register functionality for api
     */
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $request->password = Hash::make($request->password);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);
    }

    /**
     * This functionality helps user to logout
     */
    public function logout(Request $request){
            $request->user()->tokens()->delete();
            return response(['message' => 'You have logged out successfully!'], 200);
    }
}
