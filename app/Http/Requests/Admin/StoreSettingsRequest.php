<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'school_name_en' => 'required|string|max:255',
            'school_name_kh' => 'nullable|string|max:255',
            'school_code' => 'nullable|string|max:20',
            'address_en' => 'nullable|string',
            'address_kh' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:1024',
            'academic_year' => 'nullable|string|max:20',
            'principal_name' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'telegram_url' => 'nullable|url|max:255',
            'map_embed_url' => 'nullable|string',
            'is_maintenance_mode' => 'boolean',
        ];
    }
}
