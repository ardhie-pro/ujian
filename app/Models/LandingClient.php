<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'order',
        'is_active',
    ];
}
