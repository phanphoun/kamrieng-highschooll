<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_km',
        'title_en',
        'body_km',
        'body_en',
        'is_urgent',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'is_urgent' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('starts_at')
              ->orWhere('starts_at', '<=', now());
        })->where(function ($q) {
            $q->whereNull('ends_at')
              ->orWhere('ends_at', '>=', now());
        });
    }

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
