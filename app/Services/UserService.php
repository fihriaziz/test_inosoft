<?php

namespace App\Services;

use App\Repositories\User\UserEloquent;
use Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{

    private $userEloquent;

    public function __construct(UserEloquent $userEloquent)
    {
        $this->userEloquent = $userEloquent;
    }

    public function login($input)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            $user = $this->userEloquent->getByEmail($input['email']);
            if (!$user) {
                throw new Exception('Invalid Email/Password', 500);
            }

            $data['user'] = JWTAuth::fromUser($user);
            return $data;
        } catch (JWTException $th) {
            throw new Exception($th->getMessage());
        }
    }
}
