<?php

namespace App\Filament\Resources\DocumentoResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Query\Builder;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\DocumentoResource;
use App\Models\Remitente;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class ListDocumentos extends ListRecords
{
    protected static string $resource = DocumentoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make('filament.resources.remitentes.create')->label('Registrar Administrado')->url(route('filament.resources.remitentes.create')),
            // Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): EloquentBuilder
    {
        return parent::getTableQuery()->where('user_id', auth()->user()->id);
    }
}
