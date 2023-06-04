<?php

namespace App\Filament\Resources\MesaAyudaResource\Pages;

use App\Filament\Resources\MesaAyudaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMesaAyuda extends EditRecord
{
    protected static string $resource = MesaAyudaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
