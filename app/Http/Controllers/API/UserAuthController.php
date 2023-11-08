<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Resources\UserResource;
use App\Services\UserAuthService;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function __construct(protected UserAuthService $user)
    {
        $this->middleware('auth:sanctum')->only('logout');
    }

    public function login(UserLoginRequest $request)
    {
        $isAuthenticated = $this->user->login($request->validated());
        if (!$isAuthenticated) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $authenticatedUser = auth()->user();
        $token = $authenticatedUser->createToken('authToken')->plainTextToken;
        return response()->json([
            'message' => 'Logged in successfully',
            'statusCode' => 200,
            'token' => $token,
            'user' => new UserResource($authenticatedUser),
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
