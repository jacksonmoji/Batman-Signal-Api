<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getToken($email)
    {
        $auth = $this->user->where('email', $email)->firstOrFail();

        $token = $auth->createToken('auth_token')->plainTextToken;

        return $token;
    }


}