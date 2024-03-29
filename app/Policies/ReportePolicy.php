<?php

namespace App\Policies;

use App\Reporte;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function view(User $user, Reporte $reporte)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function update(User $user, Reporte $reporte)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function delete(User $user, Reporte $reporte)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function restore(User $user, Reporte $reporte)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Reporte  $reporte
     * @return mixed
     */
    public function forceDelete(User $user, Reporte $reporte)
    {
        //
    }

    public function verificar(User $user, Reporte $reporte)
    {
        return $user->rol_id == 4 && !$reporte->verificado;
    }

    public function verificacion(User $user, Reporte $reporte)
    {
        return $user->rol_id == 4 && !$reporte->verificado;
    }
}
