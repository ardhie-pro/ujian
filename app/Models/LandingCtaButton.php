<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingCtaButton extends Model
{
    protected $fillable = [
        'label',
        'icon',
        'link',
        'order',
        'is_active',
    ];
}
