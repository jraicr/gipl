<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Peripheral;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeripheralPolicy
{
    use HandlesAuthorization;

    //viewAny, view, create, update, edit, delete

    public function viewAny(User $user)
    {
        return $user->hasRole('Admin') || $user->hasRole('Gestor de incidencias') || $user->hasRole('Profesor');
    }

    public function view(User $user)
    {
        return $user->hasRole('Admin') || $user->hasRole('Gestor de incidencias') || $user->hasRole('Profesor');
    }

    public function create(User $user)
    {
        return $user->hasRole('Admin');
    }

    public function update(User $user)
    {
        return $user->hasRole('Admin');
    }

    public function delete(User $user)
    {
        return $user->hasRole('Admin');
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
