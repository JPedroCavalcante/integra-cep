<?php

namespace App\Services\ViaCEPAPI;

class HydrateContentViaCEPAPIService
{
    public function run(object $data): array
    {
        return [
            'zipcode' => $data->cep,
            'address' => $data->logradouro,
            'number' => null,
            'complement' => $data->complemento,
            'neighborhood' => $data->bairro,
            'city' => $data->localidade,
            'state' => $data->uf,
            'latitude' => null,
            'longitude' => null,
        ];
    }
}
