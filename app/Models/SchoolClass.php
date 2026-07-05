<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'grade_level',
        'section',
        'room_number',
        'teacher_id',
        'capacity',
        'academic_year',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'capacity' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the teacher for the class.
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    /**
     * Get the teacher user for the class.
     */
    public function teacherUser()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the students in the class.
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'class_id', 'student_id')
                    ->withPivot('enrollment_date', 'status')
                    ->withTimestamps();
    }

    /**
     * Get the enrollments for the class.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'class_id');
    }

    /**
     * Get the subjects for the class.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'class_subjects');
    }

    /**
     * Get the attendance records for the class.
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Get the assignments for the class.
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get the current number of students in the class.
     */
    public function getCurrentStudentCountAttribute()
    {
        return $this->students()->count();
    }

    /**
     * Check if the class has available capacity.
     */
    public function hasCapacity()
    {
        return $this->current_student_count < $this->capacity;
    }
}