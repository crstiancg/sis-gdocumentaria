<?php

namespace App\Filament\Resources\DepartamentoResource\Pages;

use App\Filament\Resources\DepartamentoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDepartamentos extends ManageRecords
{
    protected static string $resource = DepartamentoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
