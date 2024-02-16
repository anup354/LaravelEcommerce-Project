<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderbillinginfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'billing_name',
        'billing_email',
        'billing_address',
        'billing_phonenumber',

        'shipping_name',
        'shipping_email',
        'shipping_address',
        'shipping_phonenumber',

    ];
}
