<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $table = 'categories';

    public function brands()
    {
        return $this->belongsToMany('App\Models\Brand', 'brands_categories')->withPivot('id');
    }
}
