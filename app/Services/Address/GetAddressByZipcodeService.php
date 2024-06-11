<?php

namespace App\Services\Address;

use App\Models\Address;
use App\Services\AwesomeAPI\GetAddressByZipcodeAwesomeAPIService;
use App\Services\ViaCEPAPI\GetAddressByZipCodeViaCEPAPIService;

class GetAddressByZipcodeService
{
    private Address $address;
    private StoreAddressService $storeAddressService;
    private UpdateAddressService $updateAddressService;
    private GetAddressByZipcodeAwesomeAPIService $getAddressByZipcodeAwesomeAPIService;
    private GetAddressByZipCodeViaCEPAPIService $getAddressByZipCodeViaCEPAPIService;

    public function __construct(
        Address $address,
        StoreAddressService $storeAddressService,
        UpdateAddressService $updateAddressService,
        GetAddressByZipcodeAwesomeAPIService $getAddressByZipcodeAwesomeAPIService,
        GetAddressByZipCodeViaCEPAPIService $getAddressByZipCodeViaCEPAPIService
    ){
        $this->address = $address;
        $this->storeAddressService = $storeAddressService;
        $this->updateAddressService = $updateAddressService;
        $this->getAddressByZipcodeAwesomeAPIService = $getAddressByZipcodeAwesomeAPIService;
        $this->getAddressByZipCodeViaCEPAPIService = $getAddressByZipCodeViaCEPAPIService;
    }

    public function run(array $data): null|object
    {
        $address = $this->address->where('zipcode', $data['zipcode'])->first();

        if(!$address || is_null($address->address)){
            $responseAwesomeAPI = $this->getAddressByZipcodeAwesomeAPIService->run($data['zipcode']);
            $response = $responseAwesomeAPI;
            if(!$response){
                $responseViaCEP = $this->getAddressByZipCodeViaCEPAPIService->run($data['zipcode']);
                if(!$responseViaCEP){
                    return null;
                }
                $response = $responseViaCEP;
            }

            if(!is_null($address->latitude)) unset($response['latitude']);
            if(!is_null($address->longitude)) unset($response['longitude']);
            if($address && is_null($address->address)){
                $address = $this->updateAddressService->run($response, $address);
            }
            if(!$address){
                $address = $this->storeAddressService->run($response);
            }
        }

        return $address;
    }
}
