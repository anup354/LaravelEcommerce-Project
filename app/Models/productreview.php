<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productreview extends Model
{
    use HasFactory;
    protected $fillable = [
        "review",
        "rating",
        "product_id",
        "user_id",
        "status",
    ];

    public function getUser()
    {
        return $this->belongsTo(CustomerRegistration::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
