<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproductattribute extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'order_item_id',
        'product_id',
        'attribute_group_id',
        'attribute_id',
    ];
    public function getAttributename()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
