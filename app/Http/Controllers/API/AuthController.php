<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class AuthController extends Controller
{
    public function login(
        LoginRequest $loginRequest,
        LoginService $loginService
    ): Response|Application|ResponseFactory
    {
        $data = $loginRequest->validated();
        $login = $loginService->run($data);
        return response($login);
    }

    public function logout(LogoutService $logoutService): Response|Application|ResponseFactory
    {
        return $logoutService->run();
    }

    public function user(): Response|Application|ResponseFactory
    {
        return response([
            'user' => new UserResource(auth()->user())
        ]);
    }
}
