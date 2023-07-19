<?php

namespace App\Filament\Resources\DerivarDocumentoResource\Pages;

use App\Filament\Resources\DerivarDocumentoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDerivarDocumento extends EditRecord
{
    protected static string $resource = DerivarDocumentoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
