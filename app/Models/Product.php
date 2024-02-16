<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'slug',
        'featured',
        'slider',
        'brand',
        'featured_image',
        'product_order',
        'product_price',
        'cutoff_price',
        'category_id',
        'description',
        'mrp_price',
        'video',
        'discount_amount',
        'product_stock',
        'tax_type',
        'tax_percentage',
        'total_sale',

    ];

    public function getBrand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }
}
