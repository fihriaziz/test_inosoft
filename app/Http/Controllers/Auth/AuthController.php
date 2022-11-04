<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // private $service;

    // public function __construct(UserService $service)
    // {
    //     $this->service = $service;
    // }

    // public function login(Request $req)
    // {
    //     $input = $req->all();
    //     try {
    //         $response = $this->service->login($input);
    //     } catch (Exception $th) {
    //         return response()->json(['message' => $th->getMessage()]);
    //     }

    //     return response()->json(['data' => $response, 'message' => 'login success'], 200);
    // }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $req->only(['email', 'password']);
        if (!$token = Auth::attempt($credentials)) {
            return response()->json('unauthorized', 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
