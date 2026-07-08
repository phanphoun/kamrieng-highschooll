<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    protected $fillable = [
        'name_en',
        'name_kh',
        'color',
        'sort_order',
        'is_default',
    ];

    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function applications()
    {
        return $this->hasMany(EnrollmentApplication::class, 'status_id');
    }
}
