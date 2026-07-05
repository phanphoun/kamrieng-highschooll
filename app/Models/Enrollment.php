<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'class_id',
        'enrollment_date',
        'status',
        'academic_year',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'enrollment_date' => 'date',
    ];

    /**
     * Get the student for the enrollment.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the class for the enrollment.
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the grades for the enrollment.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Get the attendance records for the enrollment.
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}