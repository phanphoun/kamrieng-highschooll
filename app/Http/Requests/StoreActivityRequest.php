<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'content_en' => 'nullable|string',
            'content_kh' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'activity_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:50',
            'is_published' => 'boolean',
        ];
    }
}
