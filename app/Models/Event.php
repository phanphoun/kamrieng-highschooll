<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_km',
        'title_en',
        'description_km',
        'description_en',
        'start_date',
        'end_date',
        'location',
        'cover_image',
        'status',
        'is_featured',
        'registration_link',
        'author_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now())
            ->where('status', 'published')
            ->orderBy('start_date');
    }

    public function scopeOngoing($query)
    {
        return $query->where('start_date', '<=', now())
            ->where(function ($q) {
                $q->whereNull('end_date')
                  ->orWhere('end_date', '>=', now());
            })
            ->where('status', 'published')
            ->orderBy('start_date');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title_km', 'like', "%{$term}%")
              ->orWhere('title_en', 'like', "%{$term}%")
              ->orWhere('description_km', 'like', "%{$term}%")
              ->orWhere('description_en', 'like', "%{$term}%")
              ->orWhere('location', 'like', "%{$term}%");
        });
    }
}
