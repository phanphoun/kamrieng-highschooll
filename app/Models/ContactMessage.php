<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'is_replied',
        'read_at',
        'replied_at',
        'replied_by',
        'reply_message',
    ];

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
            'is_replied' => 'boolean',
            'read_at' => 'datetime',
            'replied_at' => 'datetime',
        ];
    }

    public function replier()
    {
        return $this->belongsTo(User::class, 'replied_by');
    }
}
