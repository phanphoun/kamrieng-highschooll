<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title_en',
        'title_kh',
        'slug',
        'content_en',
        'content_kh',
        'meta_description_en',
        'meta_description_kh',
        'featured_image',
        'is_published',
        'show_in_menu',
        'sort_order',
        'template',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'show_in_menu' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
