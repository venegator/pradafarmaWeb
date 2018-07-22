<?php

namespace App\Policies;

use App\User;
use App\Cita;
use Illuminate\Auth\Access\HandlesAuthorization;

class CitasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cita.
     *
     * @param  \App\User  $user
     * @param  \App\Cita  $cita
     * @return mixed
     */
    public function view(User $user, Cita $cita)
    {
        //
    }

    /**
     * Determine whether the user can create citas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the cita.
     *
     * @param  \App\User  $user
     * @param  \App\Cita  $cita
     * @return mixed
     */
    public function update(User $user, Cita $cita)
    {
        //
    }

    /**
     * Determine whether the user can delete the cita.
     *
     * @param  \App\User  $user
     * @param  \App\Cita  $cita
     * @return mixed
     */
    public function delete(User $user, Cita $cita)
    {
        //
    }
}
