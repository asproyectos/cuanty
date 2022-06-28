<?php

namespace App\Policies;

use App\UnidadGestionCuenca;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnidadGestionCuencaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any unidad gestion cuencas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the unidad gestion cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadGestionCuenca  $unidadGestionCuenca
     * @return mixed
     */
    public function view(User $user, UnidadGestionCuenca $unidadGestionCuenca)
    {
        //
    }

    /**
     * Determine whether the user can create unidad gestion cuencas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the unidad gestion cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadGestionCuenca  $unidadGestionCuenca
     * @return mixed
     */
    public function update(User $user, UnidadGestionCuenca $unidadGestionCuenca)
    {
        //
    }

    /**
     * Determine whether the user can delete the unidad gestion cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadGestionCuenca  $unidadGestionCuenca
     * @return mixed
     */
    public function delete(User $user, UnidadGestionCuenca $unidadGestionCuenca)
    {
        //
    }

    /**
     * Determine whether the user can restore the unidad gestion cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadGestionCuenca  $unidadGestionCuenca
     * @return mixed
     */
    public function restore(User $user, UnidadGestionCuenca $unidadGestionCuenca)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the unidad gestion cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\UnidadGestionCuenca  $unidadGestionCuenca
     * @return mixed
     */
    public function forceDelete(User $user, UnidadGestionCuenca $unidadGestionCuenca)
    {
        //
    }
}
