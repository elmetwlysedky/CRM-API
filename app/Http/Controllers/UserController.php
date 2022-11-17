<?php

namespace App\Http\Controllers;

use App\Crm\User\Requests\UserRequest;
use App\Crm\User\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;
    const TOKEN_NAME = "personal";

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UserRequest $request){
        $user = $this->userService->store($request);
        return response()->json([
            'user' => $user,
            'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken
        ]);
    }
}
