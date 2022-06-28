<?php

namespace App\Policies;

use App\Especie;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EspeciePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any especies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the especie.
     *
     * @param  \App\User  $user
     * @param  \App\Especie  $especie
     * @return mixed
     */
    public function view(User $user, Especie $especie)
    {
        //
    }

    /**
     * Determine whether the user can create especies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the especie.
     *
     * @param  \App\User  $user
     * @param  \App\Especie  $especie
     * @return mixed
     */
    public function update(User $user, Especie $especie)
    {
        //
    }

    /**
     * Determine whether the user can delete the especie.
     *
     * @param  \App\User  $user
     * @param  \App\Especie  $especie
     * @return mixed
     */
    public function delete(User $user, Especie $especie)
    {
        //
    }

    /**
     * Determine whether the user can restore the especie.
     *
     * @param  \App\User  $user
     * @param  \App\Especie  $especie
     * @return mixed
     */
    public function restore(User $user, Especie $especie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the especie.
     *
     * @param  \App\User  $user
     * @param  \App\Especie  $especie
     * @return mixed
     */
    public function forceDelete(User $user, Especie $especie)
    {
        //
    }
}
