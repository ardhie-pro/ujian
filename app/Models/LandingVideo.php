<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingVideo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'background_image',
    ];
}
