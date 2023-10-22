<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserLoginRequest;
use App\Services\UserAuthService;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function __construct(protected UserAuthService $userAuthService)
    {
        $this->middleware('guest')->except('destroy');
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
    public function destroy(Request $request)
    {
        $this->userAuthService->logout();
        $request->session()->invalidate();
        return redirect()->route('/')->with('message', 'You have successfully logged out.');
    }

}
