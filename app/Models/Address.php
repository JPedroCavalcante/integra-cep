<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $collection = 'addresses';
    protected $connection = 'mongodb';

    protected $fillable = [
        'zipcode',
        'address',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'type',
        'latitude',
        'longitude',
    ];
}
