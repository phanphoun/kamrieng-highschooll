<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'title_en',
        'title_kh',
        'subtitle_en',
        'subtitle_kh',
        'description_en',
        'description_kh',
        'image_path',
        'btn_text_en',
        'btn_text_kh',
        'btn_link',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
