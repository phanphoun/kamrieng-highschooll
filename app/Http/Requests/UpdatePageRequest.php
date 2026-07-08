<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'slug' => 'required|string|max:255|unique:pages,slug,' . $this->route('page')->id,
            'content_en' => 'nullable|string',
            'content_kh' => 'nullable|string',
            'is_published' => 'boolean',
            'show_in_menu' => 'boolean',
            'sort_order' => 'integer|min:0',
            'template' => 'required|string|max:50',
        ];
    }
}
