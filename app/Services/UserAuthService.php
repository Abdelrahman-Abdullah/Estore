<?php

namespace App\Services;

use App\Models\User;

class UserAuthService
{
    public function register(array $data): void
    {
        User::create($data);
    }
}
