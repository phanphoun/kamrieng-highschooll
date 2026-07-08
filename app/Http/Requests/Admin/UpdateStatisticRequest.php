<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatisticRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'label_en' => 'required|string|max:255',
            'label_kh' => 'nullable|string|max:255',
            'value' => 'required|string|max:50',
            'icon' => 'nullable|string|max:50',
            'prefix' => 'nullable|string|max:20',
            'suffix' => 'nullable|string|max:20',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ];
    }
}
