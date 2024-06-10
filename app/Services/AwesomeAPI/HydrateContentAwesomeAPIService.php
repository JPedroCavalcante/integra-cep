<?php

namespace App\Services\AwesomeAPI;

class HydrateContentAwesomeAPIService
{
    public function run(array $data): array
    {
        return [
            'address' => $data['address'],
        ];
    }
}
