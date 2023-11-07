<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRegisterRequest;
use App\Services\UserAuthService;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function __construct(protected UserAuthService $user)
    {
    }

    public function __invoke(UserRegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->user->register($request->validated());
        return response()->json(
            [
                'message' => 'User created successfully',
                'statusCode' => '201',
            ],
            201
        );
    }
}
