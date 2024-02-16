<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'featured_image',
        'order',
        'slug',
        'status',
        'category_id',
        'views',
        'description',
        'reading_time'
    ];
}
