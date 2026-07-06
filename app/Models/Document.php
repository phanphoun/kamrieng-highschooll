<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_km',
        'title_en',
        'file_path',
        'file_size',
        'category',
        'download_count',
    ];

    protected $casts = [
        'file_size' => 'integer',
        'download_count' => 'integer',
    ];

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title_km', 'like', "%{$term}%")
              ->orWhere('title_en', 'like', "%{$term}%");
        });
    }
}
