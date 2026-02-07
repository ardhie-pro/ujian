<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingService extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'description',
        'link',
        'order',
        'is_active',
    ];
}
