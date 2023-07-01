<?php

namespace App\Filament\Resources\DocumentoResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Database\Query\Builder;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\DocumentoResource;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class ListDocumentos extends ListRecords
{
    protected static string $resource = DocumentoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): EloquentBuilder
    {
        return parent::getTableQuery()->where('user_id', auth()->user()->id);
    }


}
