<?php

namespace App\Policies;

use App\Models\Clase;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClasePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver clases')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Clase $clase): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Crear clases')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Clase $clase): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar clases')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Clase $clase): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar clases')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Clase $clase): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Clase $clase): bool
    {
        return false;
    }
}
