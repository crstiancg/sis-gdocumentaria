<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use League\CommonMark\Node\Block\Document;
use App\Models\Documento;
use App\Models\MesaAyuda;

class DocumentoStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Documentos', Documento::count())
            ->icon('heroicon-o-document-text')
            ->color('teal')
            ->chart([1, 10, 3, 12, 1, 14, 10, 1, 2, 10]),

            Card::make('Mesa de Ayuda', MesaAyuda::count())
            ->icon('heroicon-o-folder-open')
            ->color('teal')
            ->chart([1, 10, 3, 12, 1, 14, 10, 1, 2, 10]),
           // Card::make('Documentos Pendientes', '214'),
           // Card::make('Documentos Derivados', '3'),
           // Card::make('Documentos Finalizados', '315'),
        ];

    }
}
