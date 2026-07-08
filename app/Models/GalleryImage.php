<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'album_id',
        'image_path',
        'caption_en',
        'caption_kh',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class, 'album_id');
    }
}
