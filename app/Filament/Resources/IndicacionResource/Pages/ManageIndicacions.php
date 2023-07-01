<?php

namespace App\Filament\Resources\IndicacionResource\Pages;

use App\Filament\Resources\IndicacionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageIndicacions extends ManageRecords
{
    protected static string $resource = IndicacionResource::class;


    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
