<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'date_of_birth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
        ];
    }

    /**
     * Get the role that owns the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the school classes for the user (for teachers).
     */
    public function classes()
    {
        return $this->hasMany(SchoolClass::class, 'teacher_id');
    }

    /**
     * Get the enrollments for the user (for students).
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    /**
     * Get the school classes the user is enrolled in (for students).
     */
    public function schoolClasses()
    {
        return $this->belongsToMany(SchoolClass::class, 'enrollments', 'student_id', 'class_id');
    }

    /**
     * Get the attendance records for the user.
     */
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

    /**
     * Get the grades for the user.
     */
    public function grades()
    {
        return $this->hasMany(Grade::class, 'student_id');
    }

    /**
     * Get the submissions for the user.
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'student_id');
    }

    /**
     * Get the assignments for the user (through submissions).
     */
    public function assignments()
    {
        return $this->hasManyThrough(Assignment::class, Submission::class, 'student_id', 'id', 'id', 'assignment_id');
    }

    /**
     * Get the notifications for the user.
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'recipient_id');
    }

    /**
     * Get the unread notifications for the user.
     */
    public function unreadNotifications()
    {
        return $this->notifications()->unread();
    }

    /**
     * Check if user has a specific role.
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Check if user is an admin.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is a teacher.
     */
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    /**
     * Check if user is a student.
     */
    public function isStudent()
    {
        return $this->role === 'student';
    }

    /**
     * Check if user is a parent.
     */
    public function isParent()
    {
        return $this->role === 'parent';
    }

    /**
     * Check if user is a content editor.
     */
    public function isContentEditor()
    {
        return $this->role === 'content_editor';
    }

    /**
     * Route name of the dashboard for this user's role.
     */
    public function dashboardRouteName(): string
    {
        return match ($this->role) {
            'admin' => 'admin.dashboard',
            'teacher' => 'teacher.dashboard',
            'student' => 'student.dashboard',
            'parent' => 'parent.dashboard',
            'content_editor' => 'editor.dashboard',
            default => 'dashboard',
        };
    }
}
