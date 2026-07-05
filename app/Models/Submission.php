<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'assignment_id',
        'student_id',
        'submission_text',
        'submission_file',
        'submitted_at',
        'grade',
        'feedback',
        'graded_by',
        'graded_at',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'submitted_at' => 'datetime',
        'graded_at' => 'datetime',
        'grade' => 'decimal:2',
    ];

    /**
     * Get the assignment for the submission.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the student for the submission.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the user who graded the submission.
     */
    public function gradedBy()
    {
        return $this->belongsTo(User::class, 'graded_by');
    }

    /**
     * Get the grade for the submission.
     */
    public function grade()
    {
        return $this->hasOne(Grade::class);
    }

    /**
     * Check if the submission is late.
     */
    public function isLate()
    {
        return $this->submitted_at->gt($this->assignment->due_date);
    }

    /**
     * Check if the submission has been graded.
     */
    public function isGraded()
    {
        return !is_null($this->graded_at);
    }

    /**
     * Scope to get on-time submissions.
     */
    public function scopeOnTime($query)
    {
        return $query->whereColumn('submitted_at', '<=', 'assignments.due_date');
    }

    /**
     * Scope to get late submissions.
     */
    public function scopeLate($query)
    {
        return $query->whereColumn('submitted_at', '>', 'assignments.due_date');
    }

    /**
     * Scope to get graded submissions.
     */
    public function scopeGraded($query)
    {
        return $query->whereNotNull('graded_at');
    }

    /**
     * Scope to get ungraded submissions.
     */
    public function scopeUngraded($query)
    {
        return $query->whereNull('graded_at');
    }

    /**
     * Scope to get submitted submissions.
     */
    public function scopeSubmitted($query)
    {
        return $query->where('status', 'submitted');
    }

    /**
     * Scope to get draft submissions.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }
}