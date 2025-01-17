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
        'image'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_products')->withPivot('quantity');
    }
}
