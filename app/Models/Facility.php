<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image_url',
        'description',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];
}

