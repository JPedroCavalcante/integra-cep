<?php

namespace App\Services\AwesomeAPI;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class GetAddressByZipcodeAwesomeAPIService
{
    private Client $client;
    private HydrateContentAwesomeAPIService $hydrateContentAwesomeAPIService;

    public function __construct(Client $client, HydrateContentAwesomeAPIService $hydrateContentAwesomeAPIService)
    {
        $this->client = $client;
        $this->hydrateContentAwesomeAPIService = $hydrateContentAwesomeAPIService;
    }

    public function run(string $zipcode): array
    {
        try{
            $request = new Request('GET', 'https://cep.awesomeapi.com.br/json/' .  $zipcode);
            $response = $this->client->send($request);
            $body = json_decode($response->getBody());
            return $this->hydrateContentAwesomeAPIService->run($body);
        } catch (Exception) {
            return [];
        }
    }
}
