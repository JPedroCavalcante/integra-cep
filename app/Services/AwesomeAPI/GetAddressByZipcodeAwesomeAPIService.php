<?php

namespace App\Services\AwesomeAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class GetAddressByZipcodeAwesomeAPIService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function run(string $zipcode)
    {
        $request = new Request('GET', 'https://cep.awesomeapi.com.br/json/' .  $zipcode);
        $response = $this->client->send($request);
        $body = $response->getBody();
        return json_decode($body);
    }
}
