<?php

namespace App\Services\Auth;

use App\Exceptions\InvalidCredentialsException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * @throws InvalidCredentialsException
     */
    public function run($data): ?Authenticatable
    {
        if (!Auth::attempt($data)) {
            throw new InvalidCredentialsException();
        }

        $user = auth()->user();
        $user->token = $user->createToken('API Token')->plainTextToken;
        return $user;
    }
}
