<?php

namespace App\Policies;

use App\Models\Activity;
use App\Models\User;

class ActivityPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('manage_activities');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('manage_activities');
    }

    public function update(User $user, Activity $activity): bool
    {
        return $user->hasPermissionTo('manage_activities');
    }

    public function delete(User $user, Activity $activity): bool
    {
        return $user->hasPermissionTo('manage_activities');
    }
}
