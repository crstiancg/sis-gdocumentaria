<?php

namespace App\Filament\Resources\MesaAyudaResource\Pages;

use App\Filament\Resources\MesaAyudaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMesaAyuda extends ViewRecord
{
    protected static string $resource = MesaAyudaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
