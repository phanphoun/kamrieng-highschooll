<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_kh',
        'description_en',
        'description_kh',
        'category',
        'achieved_by',
        'achieved_date',
        'image',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'achieved_date' => 'date',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
