<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'author_id',
        'title_km',
        'title_en',
        'description_km',
        'description_en',
        'activity_date',
        'location',
        'status',
    ];

    protected $casts = [
        'activity_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ActivityCategory::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title_km', 'like', "%{$term}%")
              ->orWhere('title_en', 'like', "%{$term}%")
              ->orWhere('description_km', 'like', "%{$term}%")
              ->orWhere('description_en', 'like', "%{$term}%");
        });
    }
}
