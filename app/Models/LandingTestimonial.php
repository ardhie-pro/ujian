<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingTestimonial extends Model
{
    protected $fillable = [
        'name',
        'company',
        'message',
        'photo',
        'is_active',
        'order',
    ];
}
