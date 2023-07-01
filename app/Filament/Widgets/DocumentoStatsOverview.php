<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use League\CommonMark\Node\Block\Document;
use App\Models\Documento;

class DocumentoStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Documentos', Documento::all()->count()),
            Card::make('Mesa de Ayuda', '214'),
           // Card::make('Documentos Pendientes', '214'),
           // Card::make('Documentos Derivados', '3'),
           // Card::make('Documentos Finalizados', '315'),
        ];

    }
}
