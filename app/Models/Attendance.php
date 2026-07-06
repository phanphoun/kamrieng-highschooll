<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attendance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'class_id',
        'date',
        'status',
        'notes',
        'marked_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
    ];

    /**
     * Get the student for the attendance record.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the class for the attendance record.
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the user who marked the attendance.
     */
    public function markedBy()
    {
        return $this->belongsTo(User::class, 'marked_by');
    }

    /**
     * Scope to get present attendance.
     */
    public function scopePresent($query)
    {
        return $query->where('status', 'present');
    }

    /**
     * Scope to get absent attendance.
     */
    public function scopeAbsent($query)
    {
        return $query->where('status', 'absent');
    }

    /**
     * Scope to get late attendance.
     */
    public function scopeLate($query)
    {
        return $query->where('status', 'late');
    }

    /**
     * Scope to get excused attendance.
     */
    public function scopeExcused($query)
    {
        return $query->where('status', 'excused');
    }
}