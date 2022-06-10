<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Models\User;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends ApiController
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'),false,false)) {
            
            $user = User::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('auth_token')->plainTextToken;

            return $this->respondWithSuccess(self::SUCCESS_MESSAGE, self::SUCCESS_CODE, ['api_access_token' => $token]);

        }

        return $this->errorUnauthorized();
    }

}