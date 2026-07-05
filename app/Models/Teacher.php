<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'employee_id',
        'joining_date',
        'specialization',
        'qualification',
        'experience_years',
        'salary',
        'subject_ids',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'joining_date' => 'date',
        'experience_years' => 'integer',
        'salary' => 'decimal:2',
        'subject_ids' => 'array',
    ];

    /**
     * Get the user that owns the teacher profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the school classes where this teacher is assigned.
     */
    public function schoolClasses()
    {
        return $this->hasMany(SchoolClass::class, 'teacher_id');
    }

    /**
     * Get the classes for the teacher.
     */
    public function classes()
    {
        return $this->hasMany(SchoolClass::class, 'teacher_id');
    }

    /**
     * Get the subjects for the teacher.
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }

    /**
     * Get the assignments created by the teacher.
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}