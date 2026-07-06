<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'category_id',
        'author_id',
        'title_km',
        'title_en',
        'slug',
        'body_km',
        'body_en',
        'cover_image',
        'is_featured',
        'meta_title_km',
        'meta_title_en',
        'meta_description_km',
        'meta_description_en',
        'status',
        'published_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'localized_title',
        'localized_body',
        'localized_meta_title',
        'localized_meta_description',
        'category_name',
        'image_url',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getLocalizedTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kh' ? ($this->title_km ?: $this->title_en) : $this->title_en;
    }

    public function getLocalizedBodyAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kh' ? ($this->body_km ?: $this->body_en) : $this->body_en;
    }

    public function getLocalizedMetaTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kh' ? ($this->meta_title_km ?: $this->meta_title_en) : $this->meta_title_en;
    }

    public function getLocalizedMetaDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kh' ? ($this->meta_description_km ?: $this->meta_description_en) : $this->meta_description_en;
    }

    public function getCategoryNameAttribute()
    {
        return $this->category?->localized_name;
    }

    public function getImageUrlAttribute()
    {
        if (empty($this->cover_image)) {
            return null;
        }

        if (str_starts_with($this->cover_image, 'http')) {
            return $this->cover_image;
        }

        return asset('storage/news/' . $this->cover_image);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    protected static function booted()
    {
        static::creating(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title_en) . '-' . Str::random(5);
            }
        });
    }
}
