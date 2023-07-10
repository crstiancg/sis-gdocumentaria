<?php

namespace App\Policies;

use App\Models\Area;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AreaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver áreas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Area $area): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Crear áreas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Area $area): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar áreas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Area $area): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar áreas')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Area $area): bool
    {
        return false; 
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Area $area): bool
    {
        return false;
    }
}
