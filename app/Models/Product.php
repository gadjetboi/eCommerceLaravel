<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'description',
        'quantity',
        'price',
        'images',
        'isFeatured',
        'isRecommended',
        'brand_category_id',
        'brand_id'
    ];

    public function brandCategory() 
    {
        return $this->belongsTo('App\Models\BrandCategory');
    }

    public function brand() 
    {
        return $this->belongsTo('App\Models\Brand');
    }
}
