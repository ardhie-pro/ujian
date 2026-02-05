<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'testimonial_quote',
        'testimonial_author',
        'testimonial_author_image',
        'layout',
        'order',
        'is_active',
    ];
}
