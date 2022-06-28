<?php

namespace App\Policies;

use App\Registro;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any registros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the registro.
     *
     * @param  \App\User  $user
     * @param  \App\Registro  $registro
     * @return mixed
     */
    public function view(User $user, Registro $registro)
    {
        //
    }

    /**
     * Determine whether the user can create registros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the registro.
     *
     * @param  \App\User  $user
     * @param  \App\Registro  $registro
     * @return mixed
     */
    public function update(User $user, Registro $registro)
    {
        return $user->id == $registro->user_id;
    }

    /**
     * Determine whether the user can delete the registro.
     *
     * @param  \App\User  $user
     * @param  \App\Registro  $registro
     * @return mixed
     */
    public function delete(User $user, Registro $registro)
    {
        return $user->id == $registro->user_id;
    }

    /**
     * Determine whether the user can restore the registro.
     *
     * @param  \App\User  $user
     * @param  \App\Registro  $registro
     * @return mixed
     */
    public function restore(User $user, Registro $registro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the registro.
     *
     * @param  \App\User  $user
     * @param  \App\Registro  $registro
     * @return mixed
     */
    public function forceDelete(User $user, Registro $registro)
    {
        //
    }
}
