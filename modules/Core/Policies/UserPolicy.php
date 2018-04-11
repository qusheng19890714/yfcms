<?php

namespace Modules\Core\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Core\Models\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
