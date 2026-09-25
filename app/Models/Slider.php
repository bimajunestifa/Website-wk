<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'subtitle',
        'image_url',
        'btn_text',
        'btn_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getButtonTextAttribute()
    {
        return $this->btn_text;
    }

    public function getButtonLinkAttribute()
    {
        return $this->btn_url;
    }
}
