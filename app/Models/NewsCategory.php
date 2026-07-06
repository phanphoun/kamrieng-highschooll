<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsCategory extends Model
{
    protected $fillable = [
        'name_km',
        'name_en',
        'slug',
    ];

    protected $appends = [
        'localized_name',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public function getLocalizedNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'kh' ? ($this->name_km ?: $this->name_en) : $this->name_en;
    }

    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name_en);
            }
        });
    }
}
