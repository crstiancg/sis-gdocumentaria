<?php

namespace App\Filament\Resources\ProcedimientoResource\Pages;

use App\Filament\Resources\ProcedimientoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProcedimientos extends ManageRecords
{
    protected static string $resource = ProcedimientoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
