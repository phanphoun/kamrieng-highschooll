<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EnrollmentApplication extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'tracking_code',
        'student_name_en',
        'student_name_kh',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address',
        'previous_school',
        'grade_applying_for',
        'academic_year',
        'parent_name',
        'parent_phone',
        'parent_email',
        'parent_occupation',
        'documents',
        'additional_notes',
        'status_id',
        'reviewed_by',
        'reviewed_at',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'documents' => 'array',
            'reviewed_at' => 'datetime',
        ];
    }

    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
