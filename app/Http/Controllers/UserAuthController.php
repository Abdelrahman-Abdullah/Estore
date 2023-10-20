<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRegisterRequest;
use App\Services\UserAuthService;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function __construct(protected UserAuthService $userAuthService)
    {
        $this->middleware('guest')->except('logout');
    }

    public function create()
    {
        return view('users.register');
    }

    public function store(UserRegisterRequest $request)
    {
        $this->userAuthService->register($request->validated());
        return redirect()->route('user.register')->with('message', 'You have successfully registered.');
    }
}
