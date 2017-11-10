<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address',
        'city',
        'state',
        'country',
        'postalCode',
        'user_id'
    ];
}