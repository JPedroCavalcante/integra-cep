<?php

namespace App\Services\Auth;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogoutService
{
    public function run(): Response|Application|ResponseFactory
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return response('Sessão encerrada!', 200);
    }
}
