<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    protected $fillable = [
        'title_en',
        'title_kh',
        'description_en',
        'description_kh',
        'cover_image',
        'is_published',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function images()
    {
        return $this->hasMany(GalleryImage::class, 'album_id');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
