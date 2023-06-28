<?php

namespace App\Filament\Resources\ClaseResource\Pages;

use App\Filament\Resources\ClaseResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClases extends ManageRecords
{
    protected static string $resource = ClaseResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
