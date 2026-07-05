<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'credits',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'credits' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the classes for the subject.
     */
    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'class_subjects');
    }

    /**
     * Get the teachers for the subject.
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subjects');
    }

    /**
     * Get the assignments for the subject.
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get the grades for the subject.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}