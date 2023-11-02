<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Services\UserAuthService;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function __construct(protected UserAuthService $userAuthService)
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('users.register');
    }

    public function store(UserRegisterRequest $request)
    {
        $this->userAuthService->register($request->validated());
        return redirect()->route('user.login')->with('success', 'You have successfully registered, Login Now!.');
    }


}
