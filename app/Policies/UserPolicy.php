<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role == Role::ADMIN->value;
    }

    public function view(User $user, User $model)
    {
        return $user->role == Role::ADMIN->value;
    }

    public function create(User $user)
    {
        return $user->role == Role::ADMIN->value;
    }

    public function update(User $user, User $model)
    {
        return $user->role == Role::ADMIN->value;
    }

    public function delete(User $user, User $model)
    {
        return $user->role == Role::ADMIN->value;
    }

    public function restore(User $user, User $model)
    {
    }

    public function forceDelete(User $user, User $model)
    {
    }
}
