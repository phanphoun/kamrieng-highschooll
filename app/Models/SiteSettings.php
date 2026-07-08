<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_name_en',
        'school_name_kh',
        'school_code',
        'address_en',
        'address_kh',
        'phone',
        'email',
        'website',
        'logo_path',
        'favicon_path',
        'academic_year',
        'principal_name',
        'vice_principal_name',
        'established_year',
        'facebook_url',
        'youtube_url',
        'tiktok_url',
        'telegram_url',
        'map_embed_url',
        'about_description_en',
        'about_description_kh',
        'mission_en',
        'mission_kh',
        'vision_en',
        'vision_kh',
        'motto_en',
        'motto_kh',
        'opening_hours',
        'office_hours',
        'is_maintenance_mode',
    ];

    protected function casts(): array
    {
        return [
            'is_maintenance_mode' => 'boolean',
        ];
    }
}
