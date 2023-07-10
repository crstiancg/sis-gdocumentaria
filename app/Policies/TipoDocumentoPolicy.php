<?php

namespace App\Policies;

use App\Models\TipoDocumento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TipoDocumentoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Ver tipo de documentos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TipoDocumento $tipoDocumento): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Crear tipo de documentos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TipoDocumento $tipoDocumento): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Editar tipo de documentos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TipoDocumento $tipoDocumento): bool
    {
        if($user->hasRole('Administrador') || $user->hasPermissionTo('Eliminar tipo de documentos')){
            return true;
        }
        return false; 

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TipoDocumento $tipoDocumento): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TipoDocumento $tipoDocumento): bool
    {
        return false;
    }
}
