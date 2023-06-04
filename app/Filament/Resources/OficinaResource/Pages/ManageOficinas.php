<?php

namespace App\Filament\Resources\OficinaResource\Pages;

use App\Filament\Resources\OficinaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageOficinas extends ManageRecords
{
    protected static string $resource = OficinaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
