<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
    protected $fillable = [
        'brand_id',
        'category_id'
    ];

    protected $table = 'brands_categories';

    public function brands()
    {
        return $this->belongsToMany('App\Models\Brand', 'brands_categories')->withPivot('id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'brands_categories')->withPivot('id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
