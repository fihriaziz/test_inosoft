<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function loginRepository($email, $password)
    {
        if (!$token = Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json('unauthorized', 401);
        }

        $credentials =  [
            'access_token' => $token,
            'token_type' => 'bearer'
        ];

        return $credentials;
    }
}
