<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\GetAddressRequest;
use App\Http\Resources\AddressResource;
use App\Services\Address\GetAddressByZipcodeService;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class AddressController extends Controller
{
    public function getAddressByZipcode(
        GetAddressRequest $getAddressRequest,
        GetAddressByZipcodeService $getAddressByZipcodeService,
    ): Response|Application|ResponseFactory|JsonResponse
    {
        $data = $getAddressRequest->validated();
        $address = $getAddressByZipcodeService->run($data);
        return $address ?
            response(new AddressResource($address)) :
            response()->json([
                'message' => 'CEP não encontrado'
            ], 404);
    }
}
