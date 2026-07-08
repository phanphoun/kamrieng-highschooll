<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoticeRequest extends FormRequest
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
            'type' => 'required|string|max:50',
            'target_audience' => 'required|string|max:50',
            'is_published' => 'boolean',
            'publish_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after:publish_date',
            'is_urgent' => 'boolean',
        ];
    }
}
