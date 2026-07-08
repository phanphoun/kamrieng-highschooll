<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title_en',
        'title_kh',
        'description_en',
        'description_kh',
        'event_date',
        'event_time',
        'end_date',
        'end_time',
        'location',
        'type',
        'featured_image',
        'is_published',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'end_date' => 'date',
            'event_time' => 'datetime',
            'end_time' => 'datetime',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
