<?php

namespace App\Observers;

use App\Models\MesaAyuda;
use Illuminate\Support\Facades\Storage;

class MesaAyudaObserver
{
    /**
     * Handle the MesaAyuda "created" event.
     */
    public function created(MesaAyuda $mesaAyuda): void
    {
        
    }

    /**
     * Handle the MesaAyuda "updated" event.
     */
    public function updated(MesaAyuda $mesaAyuda): void
    {
        if ($mesaAyuda->isDirty('archivo')) {
            Storage::disk('public')->delete($mesaAyuda->getOriginal('archivo'));
        }
    }

    /**
     * Handle the MesaAyuda "deleted" event.
     */
    public function deleted(MesaAyuda $mesaAyuda): void
    {
        if (! is_null($mesaAyuda->archivo)) {
            Storage::disk('public')->delete($mesaAyuda->archivo);
        }

        if (! is_null($mesaAyuda->body)) {
            Storage::disk('public')->delete($mesaAyuda->body);
        }
    }

    /**
     * Handle the MesaAyuda "restored" event.
     */
    public function restored(MesaAyuda $mesaAyuda): void
    {
        //
    }

    /**
     * Handle the MesaAyuda "force deleted" event.
     */
    public function forceDeleted(MesaAyuda $mesaAyuda): void
    {
        if (! is_null($mesaAyuda->archivo)) {
            Storage::disk('public')->delete($mesaAyuda->archivo);
        }
    }
}
