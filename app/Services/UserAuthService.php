<?php

namespace App\Services;

use App\Models\User;

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

    public function logout(): void
    {
        auth()->logout();
    }
}
