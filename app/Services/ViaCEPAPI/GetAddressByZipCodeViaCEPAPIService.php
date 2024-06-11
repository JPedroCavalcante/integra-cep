<?php

namespace App\Services\ViaCEPAPI;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class GetAddressByZipCodeViaCEPAPIService
{
    private Client $client;
    private HydrateContentViaCEPAPIService $hydrateContentViaCEPAPIService;

    public function __construct(Client $client, HydrateContentViaCEPAPIService $hydrateContentViaCEPAPIService)
    {
        $this->client = $client;
        $this->hydrateContentViaCEPAPIService = $hydrateContentViaCEPAPIService;
    }

    public function run(string $zipcode): array
    {
        try{
            $request = new Request('GET', 'https://viacep.com.br/ws/' .  $zipcode . '/json/');
            $response = $this->client->send($request);
            $body = json_decode($response->getBody());
            return $this->hydrateContentViaCEPAPIService->run($body);
        } catch (Exception) {
            return [];
        }
    }
}
