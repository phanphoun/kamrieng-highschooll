<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_kh',
        'slug',
        'description_en',
        'description_kh',
        'content_en',
        'content_kh',
        'featured_image',
        'gallery_images',
        'activity_date',
        'location',
        'category',
        'author_id',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'gallery_images' => 'array',
            'activity_date' => 'date',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
