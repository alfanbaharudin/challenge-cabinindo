<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        return $user->role === 'Admin';
    }

    public function update(User $user)
    {
        return $user->role === 'Admin';
    }

    public function delete(User $user)
    {
        return $user->role === 'Admin';
    }
}
