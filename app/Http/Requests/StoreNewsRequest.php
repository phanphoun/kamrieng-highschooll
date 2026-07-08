<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
            'content_en' => 'required|string',
            'content_kh' => 'nullable|string',
            'excerpt_en' => 'nullable|string',
            'excerpt_kh' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'category' => 'nullable|string|max:50',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }
}
