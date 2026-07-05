<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'class_id',
        'subject_id',
        'teacher_id',
        'due_date',
        'max_score',
        'type',
        'instructions',
        'attachment_path',
        'is_published',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'datetime',
        'max_score' => 'decimal:2',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Get the class for the assignment.
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the subject for the assignment.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher who created the assignment.
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the submissions for the assignment.
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    /**
     * Get the grades for the assignment.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    /**
     * Get the students who should submit this assignment (from the class).
     */
    public function students()
    {
        return $this->schoolClass->students();
    }

    /**
     * Get the students who have submitted this assignment.
     */
    public function submittedStudents()
    {
        return $this->belongsToMany(User::class, 'submissions', 'assignment_id', 'student_id')
                    ->withPivot('submission_text', 'submission_file', 'submitted_at', 'grade')
                    ->withTimestamps();
    }

    /**
     * Scope to get published assignments.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get assignments due soon.
     */
    public function scopeDueSoon($query, $days = 3)
    {
        return $query->whereBetween('due_date', [now(), now()->addDays($days)]);
    }

    /**
     * Scope to get overdue assignments.
     */
    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now());
    }

    /**
     * Check if the assignment is overdue.
     */
    public function isOverdue()
    {
        return $this->due_date->isPast();
    }

    /**
     * Get the number of submissions received.
     */
    public function getSubmissionCountAttribute()
    {
        return $this->submissions()->count();
    }

    /**
     * Get the number of pending submissions.
     */
    public function getPendingSubmissionsAttribute()
    {
        return $this->schoolClass->students()->count() - $this->submission_count;
    }
}