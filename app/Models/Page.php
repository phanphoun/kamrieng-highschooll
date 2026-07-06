<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title_km',
        'title_en',
        'body_km',
        'body_en',
        'meta_title_km',
        'meta_title_en',
        'meta_description_km',
        'meta_description_en',
    ];

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title_km', 'like', "%{$term}%")
              ->orWhere('title_en', 'like', "%{$term}%")
              ->orWhere('body_km', 'like', "%{$term}%")
              ->orWhere('body_en', 'like', "%{$term}%");
        });
    }
}
