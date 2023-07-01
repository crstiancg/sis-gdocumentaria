<?php

namespace App\Filament\Resources\MesaAyudaResource\Pages;

use App\Filament\Resources\MesaAyudaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMesaAyudas extends ListRecords
{
    protected static string $resource = MesaAyudaResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
