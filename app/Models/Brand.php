<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $table = 'brands';

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'brands_categories')->withPivot('id');
    }

    public function products() 
    {
        return $this->hasMany('App\Models\Product');
    }
}
