<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function loginRepository($email, $password)
    {
        if (!$token = Auth::attempt(['email' => $email, 'password' => $password])) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $token;
    }
}
