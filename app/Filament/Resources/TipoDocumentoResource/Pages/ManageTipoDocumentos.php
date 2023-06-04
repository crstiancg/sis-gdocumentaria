<?php

namespace App\Filament\Resources\TipoDocumentoResource\Pages;

use App\Filament\Resources\TipoDocumentoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTipoDocumentos extends ManageRecords
{
    protected static string $resource = TipoDocumentoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
