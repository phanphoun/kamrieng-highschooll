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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * Get the English name.
     */
    public function getNameAttribute()
    {
        return $this->name_en ?? $this->name_km;
    }

    /**
     * Get the English position.
     */
    public function getPositionAttribute()
    {
        return $this->position_en ?? $this->position_km;
    }

    /**
     * Get the English bio.
     */
    public function getBioAttribute()
    {
        return $this->bio_en ?? $this->bio_km;
    }

    /**
     * Scope to order by sort_order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
