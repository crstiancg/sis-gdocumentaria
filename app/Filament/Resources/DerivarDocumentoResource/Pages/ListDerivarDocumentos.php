<?php

namespace App\Filament\Resources\DerivarDocumentoResource\Pages;

use App\Filament\Resources\DerivarDocumentoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDerivarDocumentos extends ListRecords
{
    protected static string $resource = DerivarDocumentoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
