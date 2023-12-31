<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfile;
use App\Http\Requests\User\UserLoginRequest;
use App\Services\UserAuthService;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function __construct(protected UserAuthService $userAuthService)
    {
        $this->middleware('auth')->except('create', 'store');
    }
    public function create()
    {
        return view('users.login');
    }

    public function store(UserLoginRequest $request)
    {
        $status = $this->userAuthService->login($request->validated());
        if (!$status) {
            return back()->with('message', 'The provided credentials do not match our records.',);
        }
        $request->session()->regenerate();
        return redirect()->route('products.index')->with('message', 'You have successfully logged in.');
    }
    public function show()
    {
        return view('users.profile');
    }
    public function update(UpdateUserProfile $request)
    {
        $this->userAuthService->update($request->validated());
        return back()->with('message', 'You have successfully updated your profile.');
    }
    public function destroy(Request $request)
    {
        $this->userAuthService->logout();
        $request->session()->invalidate();
        return redirect()->route('index')->with('message', 'You have successfully logged out.');
    }

}
