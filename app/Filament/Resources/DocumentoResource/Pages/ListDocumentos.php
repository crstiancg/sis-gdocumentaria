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
        // Verificar si el usuario es administrador (ajusta la condición según tu atributo)
        $isAdmin = auth()->user()->id === 1;

        $query = parent::getTableQuery();

        if ($isAdmin) {
            // Si es administrador, mostrar todos los datos sin restricciones
            return $query;
        } else {
            // Si no es administrador, aplicar las restricciones
            return $query
                ->where(function ($query) {
                    $query->where('user_id', auth()->user()->id)
                        ->orWhere(function ($query) {
                            $query->where('derivar_documento_id', auth()->user()->derivar_documento_id)
                                ->whereNull('user_id');
                        });
                });
        }
        /*return parent::getTableQuery()

            ->where('user_id', auth()->user()->id)
            ->orWhere(function ($query) {
                $query->where('oficina_id', auth()->user()->oficina_id);
                $query->whereNull('user_id');
            });*/
        /*->when(auth()->user()->oficina_id, function ($query, $oficina_id) {
                return $query->where('oficina_id', $oficina_id);
            })
            ->when(is_null(auth()->user()->id), function ($query) {
                return $query->whereNull('user_id');
            });*/

        //parent::getTableQuery()->when('user_id', auth()->user()->id);
    }
}
