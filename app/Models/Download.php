<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'title_en',
        'title_kh',
        'description_en',
        'description_kh',
        'file_path',
        'file_size',
        'file_type',
        'category',
        'download_count',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'download_count' => 'integer',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
