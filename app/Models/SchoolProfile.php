<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'logo',
        'tagline',
        'motto',
        'afirmasi',
        'attitude',
        'philosophy',
        'description',
        'principal_name',
        'principal_title',
        'principal_image',
        'video_url',
        'video_thumbnail',
        'phone',
        'whatsapp',
        'email',
        'address',
        'maps_embed_url',
        'brochure_url',
        'spmb_url',
        'character_section_title',
        'character_section_btn_text',
        'character_section_btn_url',
        'culture_section_title',
        'culture_section_btn_text',
        'culture_section_btn_url',
        'learning_section_subtitle',
        'learning_section_title',
        'pmb_banner_title',
        'pmb_banner_subtitle',
        'pmb_banner_text',
        'pmb_banner_image',
        'pmb_banner_btn_text',
        'pmb_banner_btn_url',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'youtube_url',
    ];
}

