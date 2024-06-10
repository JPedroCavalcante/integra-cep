<?php

namespace App\Services\Address;

use App\Models\Address;

class StoreAddressService
{
    private Address $address;

    public function __construct(Address $address){
        $this->address = $address;
    }

    public function run(array $data): object
    {
        return $this->address->create($data);
    }
}
