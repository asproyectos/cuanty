<?php

namespace App\Policies;

use App\Comunidad;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComunidadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any comunidads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the comunidad.
     *
     * @param  \App\User  $user
     * @param  \App\Comunidad  $comunidad
     * @return mixed
     */
    public function view(User $user, Comunidad $comunidad)
    {
        //
    }

    /**
     * Determine whether the user can create comunidads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the comunidad.
     *
     * @param  \App\User  $user
     * @param  \App\Comunidad  $comunidad
     * @return mixed
     */
    public function update(User $user, Comunidad $comunidad)
    {
        //
    }

    /**
     * Determine whether the user can delete the comunidad.
     *
     * @param  \App\User  $user
     * @param  \App\Comunidad  $comunidad
     * @return mixed
     */
    public function delete(User $user, Comunidad $comunidad)
    {
        //
    }

    /**
     * Determine whether the user can restore the comunidad.
     *
     * @param  \App\User  $user
     * @param  \App\Comunidad  $comunidad
     * @return mixed
     */
    public function restore(User $user, Comunidad $comunidad)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the comunidad.
     *
     * @param  \App\User  $user
     * @param  \App\Comunidad  $comunidad
     * @return mixed
     */
    public function forceDelete(User $user, Comunidad $comunidad)
    {
        //
    }
}
