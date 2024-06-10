<?php

namespace App\Services\Address;

use App\Models\Address;

class GetAddressByZipcodeService
{
    private Address $address;

    public function __construct(Address $address){
        $this->address = $address;
    }

    public function run(array $data): null|object
    {
        $address = $this->address->where('zipcode', $data['zipcode'])->first();

        return $address;
    }
}
