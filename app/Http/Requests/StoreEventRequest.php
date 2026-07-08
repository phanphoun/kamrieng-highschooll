<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'end_date' => 'nullable|date|after_or_equal:event_date',
            'location' => 'nullable|string|max:255',
            'type' => 'required|string|max:50',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }
}
