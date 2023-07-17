<?php

namespace App\Filament\Widgets;

use App\Models\Documento;
use App\Models\Remitente;
use Filament\Widgets\PieChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class RemitenteChart extends PieChartWidget
{
    protected static ?string $heading = 'Documentos Registrados';
    protected static ?string $maxHeight = '240px';
    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hoy',
            'week' => 'Última Semana',
            'month' => 'Última Mesa',
            'year' => 'Este Año',
        ];
    }
    protected function getData(): array
    {
        $trend = Trend::query(Documento::where('user_id', auth()->user()->id))
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
    return [
        'datasets' => [
            [
                'label' => 'Documentos Registrados',
                'data' => $trend->map(fn (TrendValue $value) => $value->aggregate),
                'backgroundColor' => [
                    'rgb(255, 100, 40)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                  ],
            ],
        ],
        'labels' => $trend->map(fn (TrendValue $value) => $value->date)
     ];
    }
}
