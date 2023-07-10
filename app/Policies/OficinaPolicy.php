<?php

namespace App\Policies;

use App\Models\Oficina;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OficinaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver oficinas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Oficina $oficina): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Crear oficinas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Oficina $oficina): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar oficinas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Oficina $oficina): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar oficinas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Oficina $oficina): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Oficina $oficina): bool
    {
        return false;
    }
}
