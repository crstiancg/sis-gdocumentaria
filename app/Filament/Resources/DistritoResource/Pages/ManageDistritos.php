<?php

namespace App\Filament\Resources\DistritoResource\Pages;

use App\Filament\Resources\DistritoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDistritos extends ManageRecords
{
    protected static string $resource = DistritoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
