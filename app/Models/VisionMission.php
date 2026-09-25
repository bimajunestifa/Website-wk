<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionMission extends Model
{
    use HasFactory;

    protected $fillable = [
        'vision',
        'mission',
        'motto',
    ];

    protected $casts = [
        'mission' => 'array',
    ];
}

