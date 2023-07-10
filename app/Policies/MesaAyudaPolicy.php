<?php

namespace App\Policies;

use App\Models\MesaAyuda;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MesaAyudaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver mesa de ayuda')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MesaAyuda $mesaAyuda): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MesaAyuda $mesaAyuda): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar mesa de ayuda')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MesaAyuda $mesaAyuda): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar mesa de ayuda')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MesaAyuda $mesaAyuda): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MesaAyuda $mesaAyuda): bool
    {
        return false;
    }
}
