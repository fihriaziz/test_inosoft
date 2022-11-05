<?php

namespace App\Service;

use App\Repositories\User\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login($email, $password)
    {
        $login = $this->userRepository->loginRepository($email, $password);
        return $login;
    }
}
