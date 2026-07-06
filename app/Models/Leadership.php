<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leadership';

    protected $fillable = [
        'name_km',
        'name_en',
        'position_km',
        'position_en',
        'photo',
        'bio_km',
        'bio_en',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name_km', 'like', "%{$term}%")
              ->orWhere('name_en', 'like', "%{$term}%")
              ->orWhere('position_km', 'like', "%{$term}%")
              ->orWhere('position_en', 'like', "%{$term}%")
              ->orWhere('bio_km', 'like', "%{$term}%")
              ->orWhere('bio_en', 'like', "%{$term}%");
        });
    }
}
