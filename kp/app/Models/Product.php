<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'brand_id',
        'category_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
