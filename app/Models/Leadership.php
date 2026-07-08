<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    protected $table = 'leadership';

    protected $fillable = [
        'name_en',
        'name_kh',
        'position_en',
        'position_kh',
        'photo',
        'bio_en',
        'bio_kh',
        'email',
        'phone',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
