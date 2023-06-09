<?php

namespace App\Filament\Resources\DocumentoResource\Pages;

use App\Filament\Resources\DocumentoResource;
use App\Filament\Resources\RemitenteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDocumento extends CreateRecord
{
    protected static string $resource = DocumentoResource::class;
    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
    
        $data['user_id'] = auth()->id();
        return $data;
    }

    protected static string $remitente = RemitenteResource::class;

    // protected function getActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make('remitentes.create')->action('remitentes.create'),
    //     ];
    // }

}
