<?php

namespace App\Policies;

use App\Cuenca;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CuencaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any cuencas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenca  $cuenca
     * @return mixed
     */
    public function view(User $user, Cuenca $cuenca)
    {
        //
    }

    /**
     * Determine whether the user can create cuencas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenca  $cuenca
     * @return mixed
     */
    public function update(User $user, Cuenca $cuenca)
    {
        //
    }

    /**
     * Determine whether the user can delete the cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenca  $cuenca
     * @return mixed
     */
    public function delete(User $user, Cuenca $cuenca)
    {
        //
    }

    /**
     * Determine whether the user can restore the cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenca  $cuenca
     * @return mixed
     */
    public function restore(User $user, Cuenca $cuenca)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the cuenca.
     *
     * @param  \App\User  $user
     * @param  \App\Cuenca  $cuenca
     * @return mixed
     */
    public function forceDelete(User $user, Cuenca $cuenca)
    {
        //
    }
}
