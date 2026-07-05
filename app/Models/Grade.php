<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
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
        'subject_id',
        'assignment_id',
        'exam_type',
        'score',
        'max_score',
        'percentage',
        'grade_letter',
        'comments',
        'graded_by',
        'graded_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'score' => 'decimal:2',
        'max_score' => 'decimal:2',
        'percentage' => 'decimal:2',
        'graded_at' => 'datetime',
    ];

    /**
     * Get the student for the grade.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the class for the grade.
     */
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the subject for the grade.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the assignment for the grade.
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the user who graded the assignment.
     */
    public function gradedBy()
    {
        return $this->belongsTo(User::class, 'graded_by');
    }

    /**
     * Calculate the percentage from score and max_score.
     */
    public function calculatePercentage()
    {
        if ($this->max_score > 0) {
            $this->percentage = ($this->score / $this->max_score) * 100;
        }
        return $this->percentage;
    }

    /**
     * Determine the letter grade based on percentage.
     */
    public function determineLetterGrade()
    {
        $percentage = $this->percentage ?? $this->calculatePercentage();
        
        return match(true) {
            $percentage >= 90 => 'A',
            $percentage >= 80 => 'B',
            $percentage >= 70 => 'C',
            $percentage >= 60 => 'D',
            default => 'F',
        };
    }

    /**
     * Scope to get passing grades.
     */
    public function scopePassing($query)
    {
        return $query->where('percentage', '>=', 60);
    }

    /**
     * Scope to get failing grades.
     */
    public function scopeFailing($query)
    {
        return $query->where('percentage', '<', 60);
    }
}