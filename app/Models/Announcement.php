<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'target_audience',
        'priority',
        'publish_date',
        'expiry_date',
        'is_active',
        'created_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'publish_date' => 'datetime',
        'expiry_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Get the user who created the announcement.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the notifications sent for this announcement.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Scope to get active announcements.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get published announcements.
     */
    public function scopePublished($query)
    {
        return $query->where('publish_date', '<=', now());
    }

    /**
     * Scope to get announcements not expired.
     */
    public function scopeNotExpired($query)
    {
        return $query->where(function($q) {
            $q->whereNull('expiry_date')->orWhere('expiry_date', '>', now());
        });
    }

    /**
     * Scope to get announcements for specific audience.
     */
    public function scopeForAudience($query, $audience)
    {
        return $query->where('target_audience', $audience)
                    ->orWhere('target_audience', 'all');
    }

    /**
     * Scope to get high priority announcements.
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }

    /**
     * Check if the announcement is currently active.
     */
    public function isCurrentlyActive()
    {
        return $this->is_active && 
               $this->publish_date->isPast() && 
               ($this->expiry_date === null || $this->expiry_date->isFuture());
    }

    /**
     * Check if the announcement is expired.
     */
    public function isExpired()
    {
        return $this->expiry_date !== null && $this->expiry_date->isPast();
    }
}