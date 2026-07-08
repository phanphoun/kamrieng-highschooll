<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title_en',
        'title_kh',
        'content_en',
        'content_kh',
        'type',
        'target_audience',
        'is_published',
        'publish_date',
        'expiry_date',
        'is_urgent',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'is_urgent' => 'boolean',
            'publish_date' => 'date',
            'expiry_date' => 'date',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('publish_date')->orWhere('publish_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('expiry_date')->orWhere('expiry_date', '>=', now());
            });
    }
}
