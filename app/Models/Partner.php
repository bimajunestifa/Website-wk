<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'badge_text',
        'logo_url',
        'website',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}

