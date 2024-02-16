<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'product_price',
       
    ];

    public function orderAttributes()
    {
        return $this->hasMany(Orderproductattribute::class,'order_item_id','id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // public function orderedProductAttributes()
    // {
    //     return $this->hasMany(Softsaro_ordered_productattribute::class, 'id', 'order_id');
    // }
}
