<?php

namespace App\Observers;

use App\Models\Documento;
use Illuminate\Support\Facades\Storage;

class DocumentoObserver
{
    /**
     * Handle the Documento "created" event.
     */
    public function created(Documento $documento): void
    {
        //
    }

    /**
     * Handle the Documento "updated" event.
     */
    public function updated(Documento $documento): void
    {
        if ($documento->isDirty('archivo')) {
            Storage::disk('public')->delete($documento->getOriginal('archivo'));
        }
    }

    /**
     * Handle the Documento "deleted" event.
     */
    public function deleted(Documento $documento): void
    {
        if (! is_null($documento->archivo)) {
            Storage::disk('public')->delete($documento->archivo);
        }

        if (! is_null($documento->body)) {
            Storage::disk('public')->delete($documento->body);
        }
    }

    /**
     * Handle the Documento "restored" event.
     */
    public function restored(Documento $documento): void
    {
        //
    }

    /**
     * Handle the Documento "force deleted" event.
     */
    public function forceDeleted(Documento $documento): void
    {
        if (! is_null($documento->archivo)) {
            Storage::disk('public')->delete($documento->archivo);
        }
    }
}
