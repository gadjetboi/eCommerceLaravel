<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable = [
        'company',
        'trackingNumber',
        'status',
        'estimatedDelivery'
    ];
}
