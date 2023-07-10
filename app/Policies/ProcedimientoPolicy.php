<?php

namespace App\Policies;

use App\Models\Procedimiento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProcedimientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver procedimientos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Procedimiento $procedimiento): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Crear procedimientos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Procedimiento $procedimiento): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar procedimientos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Procedimiento $procedimiento): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar procedimientos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Procedimiento $procedimiento): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Procedimiento $procedimiento): bool
    {
        return false;
    }
}
