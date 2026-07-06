<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_km',
        'title_en',
        'type',
        'award_level',
        'description',
        'photo',
        'awarded_on',
        'is_featured',
    ];

    protected $casts = [
        'awarded_on' => 'date',
        'is_featured' => 'boolean',
    ];

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title_km', 'like', "%{$term}%")
              ->orWhere('title_en', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%");
        });
    }
}
