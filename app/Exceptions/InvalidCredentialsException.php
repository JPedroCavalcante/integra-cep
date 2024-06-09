<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class InvalidCredentialsException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'errors' => [
                'message' => 'Crendências incorretas!',
                'code' => ResponseAlias::HTTP_UNAUTHORIZED,
            ]
        ], ResponseAlias::HTTP_UNAUTHORIZED);
    }
}
