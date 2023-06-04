<?php

namespace App\Filament\Resources\RemitenteResource\Pages;

use App\Filament\Resources\RemitenteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRemitentes extends ListRecords
{
    protected static string $resource = RemitenteResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
