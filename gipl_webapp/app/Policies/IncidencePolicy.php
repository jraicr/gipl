<?php

namespace App\Policies;

use App\Models\Incidence;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncidencePolicy
{
    use HandlesAuthorization;

    public function author(User $user, Incidence $incidence) {

        if ($user->id == $incidence->user_id || $user->hasRole('Admin') || $user->hasRole('Gestor de incidencias')) {
            return true;

        } else {
            return false;
        }
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
