<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHeroSlideRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title_en' => 'required|string|max:255',
            'title_kh' => 'nullable|string|max:255',
            'subtitle_en' => 'nullable|string|max:255',
            'subtitle_kh' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_kh' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'btn_text_en' => 'nullable|string|max:100',
            'btn_text_kh' => 'nullable|string|max:100',
            'btn_link' => 'nullable|string|max:255',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ];
    }
}
