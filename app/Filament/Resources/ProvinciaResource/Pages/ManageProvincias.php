<?php

namespace App\Filament\Resources\ProvinciaResource\Pages;

use App\Filament\Resources\ProvinciaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProvincias extends ManageRecords
{
    protected static string $resource = ProvinciaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
