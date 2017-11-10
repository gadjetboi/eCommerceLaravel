<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'status',
        'quantity',
        'totalAmount',
        'product_id',
        'user_id',
    ];
}
