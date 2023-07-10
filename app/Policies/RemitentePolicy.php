<?php

namespace App\Policies;

use App\Models\Remitente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RemitentePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver administrados')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Remitente $remitente): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Crear administrados')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Remitente $remitente): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar administrados')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Remitente $remitente): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar administrados')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Remitente $remitente): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Remitente $remitente): bool
    {
        return false;
    }
}
