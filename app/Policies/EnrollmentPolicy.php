<?php

namespace App\Policies;

use App\Models\EnrollmentApplication;
use App\Models\User;

class EnrollmentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('manage_enrollments');
    }

    public function view(User $user, EnrollmentApplication $enrollment): bool
    {
        return $user->hasPermissionTo('manage_enrollments');
    }

    public function update(User $user, EnrollmentApplication $enrollment): bool
    {
        return $user->hasPermissionTo('manage_enrollments');
    }
}
