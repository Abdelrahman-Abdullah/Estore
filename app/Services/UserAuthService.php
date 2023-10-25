<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthService
{
    public function register(array $data): void
    {
        User::create($data);
    }


    public function login(array $data): bool
    {
        if (!auth()->attempt($data)) {
            return false;
        }
        return true;
    }

    public function update(array $data): bool
    {
        if (isset($data['new_password']) && $this->checkOldPassword($data['current_password'])) {
            return auth()->user()->update(['password' => Hash::make($data['new_password'])]);
        }
        return auth()->user()->update($data);
    }

    public function checkOldPassword(string $password): bool
    {
        return Hash::check($password, auth()->user()->password);
    }

    public function logout(): void
    {
        auth()->logout();
    }
}
