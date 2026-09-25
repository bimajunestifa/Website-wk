<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'indicator_name',
        'score',
        'percentage',
        'status',
        'ranking_text',
        'notes',
        'year',
        'order',
    ];

    protected $casts = [
        'score' => 'decimal:2',
        'percentage' => 'integer',
        'order' => 'integer',
    ];
}

