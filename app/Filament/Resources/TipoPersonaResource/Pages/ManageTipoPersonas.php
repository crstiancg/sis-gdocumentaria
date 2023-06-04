<?php

namespace App\Filament\Resources\TipoPersonaResource\Pages;

use App\Filament\Resources\TipoPersonaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTipoPersonas extends ManageRecords
{
    protected static string $resource = TipoPersonaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
