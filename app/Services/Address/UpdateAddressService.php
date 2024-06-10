<?php

namespace App\Services\Address;

use App\Models\Address;

class UpdateAddressService
{
    public function run(array $data, Address $address): object
    {
        $address->update($data);
        return $address;
    }
}
