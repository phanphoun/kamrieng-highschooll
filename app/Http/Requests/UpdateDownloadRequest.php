<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDownloadRequest extends FormRequest
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
            'file' => 'nullable|file|max:10240',
            'category' => 'nullable|string|max:50',
            'is_published' => 'boolean',
        ];
    }
}
