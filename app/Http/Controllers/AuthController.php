<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
// use GuzzleHttp\Exception\GuzzleException;
// use GuzzleHttp\Client;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {

            $request['email'] = $request->username;

            $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6',
            ]);

            $request->request->add([
                    'grant_type' => env('GRANT_TYPE'),
                    'client_id' => env('CLIENT_ID'),
                    'client_secret' => env('CLIENT_SECRET'),
                    'username' => $request->username,
                    'password' => $request->password,
            ]);

            $tokenRequest = Request::create(
                env('APP_URL') . '/oauth/token',
                'post'
            );

            $response = Route::dispatch($tokenRequest);

            return $response;
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens->each(function($token, $key){
            $token->delete();
        });

        return response()->json('Logged out success!', 200);
    }
}
