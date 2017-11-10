<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'orderNo',
        'quantity',
        'totalAmount',
        'address_id',
        'user_id',
        'tracking_id',
        'payment_id'
    ];
}
