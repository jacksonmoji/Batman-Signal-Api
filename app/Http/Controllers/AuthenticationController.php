<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;
use App\Services\UserService;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends ApiController
{

    /**
     * @var userService
     */
    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }
    
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(),false,false)) {
            
            $token = $this->userService->getToken($request->validated()['email']);

            return $this->respondWithSuccess(self::SUCCESS_MESSAGE, self::SUCCESS_CODE, ['api_access_token' => $token]);

        }

        return $this->errorUnauthorized();
    }

}