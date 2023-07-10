<?php

namespace App\Policies;

use App\Models\TipoPersona;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TipoPersonaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver tipo de personas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TipoPersona $tipoPersona): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Crear tipo de personas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TipoPersona $tipoPersona): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar tipo de personas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TipoPersona $tipoPersona): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar tipo de personas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TipoPersona $tipoPersona): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TipoPersona $tipoPersona): bool
    {
        return false;
    }
}
