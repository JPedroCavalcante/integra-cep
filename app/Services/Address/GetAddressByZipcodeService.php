<?php

namespace App\Services\Address;

use App\Models\Address;

class GetAddressByZipcodeService
{
    private Address $address;
    private StoreAddressService $storeAddressService;
    private UpdateAddressService $updateAddressService;

    public function __construct(
        Address $address,
        StoreAddressService $storeAddressService,
        UpdateAddressService $updateAddressService
    ){
        $this->address = $address;
        $this->storeAddressService = $storeAddressService;
        $this->updateAddressService = $updateAddressService;
    }

    public function run(array $data): null|object
    {
        $address = $this->address->where('zipcode', $data['zipcode'])->first();

        if(
            !$address ||
            is_null($address->address)
        ){
            dd($address);
        }

        return $address;
    }
}
