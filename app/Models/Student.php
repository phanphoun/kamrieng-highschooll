<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'student_id',
        'admission_date',
        'parent_id',
        'class_id',
        'blood_group',
        'emergency_contact',
        'medical_notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'admission_date' => 'date',
    ];

    /**
     * Get the user that owns the student profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent for the student.
     */
    public function parentProfile()
    {
        return $this->belongsTo(ParentModel::class, 'parent_id');
    }

    /**
     * Get the class for the student.
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the enrollments for the student.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Get the attendance records for the student.
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Get the grades for the student.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Get the submissions for the student.
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    /**
     * Get the assignments for the student (through class enrollment).
     */
    public function classAssignments()
    {
        return $this->hasManyThrough(Assignment::class, Enrollment::class, 'student_id', 'class_id', 'id', 'class_id');
    }
}