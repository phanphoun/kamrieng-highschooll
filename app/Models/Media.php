<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'mediable_type',
        'mediable_id',
        'type',
        'file_path',
        'caption',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function mediable()
    {
        return $this->morphTo();
    }
}
