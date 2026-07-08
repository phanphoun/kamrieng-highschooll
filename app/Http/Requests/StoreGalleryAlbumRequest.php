<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryAlbumRequest extends FormRequest
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
            'description_en' => 'nullable|string',
            'description_kh' => 'nullable|string',
            'cover_image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'sort_order' => 'integer|min:0',
        ];
    }
}
