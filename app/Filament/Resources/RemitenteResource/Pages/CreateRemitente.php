<?php

namespace App\Filament\Resources\RemitenteResource\Pages;

use App\Filament\Resources\RemitenteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRemitente extends CreateRecord
{
    protected static string $resource = RemitenteResource::class;

    protected function getRedirectUrl(): string
    {
        return route('filament.resources.documentos.create');
    }
}
