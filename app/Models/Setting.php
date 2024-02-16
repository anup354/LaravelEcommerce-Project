<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'address',
        'contact_number',
        'facebook',
        'instagram',
        'tiktok',
        'delivery_insidevalley',
        'delivery_outsidevalley',
        'tax',
    ];
}
