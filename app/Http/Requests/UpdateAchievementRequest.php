<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAchievementRequest extends FormRequest
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
            'category' => 'nullable|string|max:50',
            'achieved_by' => 'nullable|string|max:255',
            'achieved_date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
        ];
    }
}
