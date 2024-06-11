<?php

namespace App\Services\AwesomeAPI;

class HydrateContentAwesomeAPIService
{
    public function run(object $data): array
    {
        return [
            'zipcode' => $data->cep,
            'address' => $data->address,
            'number' => null,
            'complement' => null,
            'neighborhood' => $data->district,
            'city' => $data->city,
            'state' => $data->state,
            'latitude' => $data->lat,
            'longitude' => $data->lng,
        ];
    }
}
