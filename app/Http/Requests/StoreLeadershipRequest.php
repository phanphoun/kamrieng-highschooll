<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadershipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name_en' => 'required|string|max:255',
            'name_kh' => 'nullable|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_kh' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'bio_en' => 'nullable|string',
            'bio_kh' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ];
    }
}
