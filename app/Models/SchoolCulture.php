<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolCulture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'subtitle',
        'description',
        'image_url',
        'icon',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}

