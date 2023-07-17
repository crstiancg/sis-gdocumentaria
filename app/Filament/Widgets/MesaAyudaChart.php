<?php

namespace App\Filament\Widgets;

use App\Models\MesaAyuda;
use App\Models\Remitente;
use Filament\Widgets\BarChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class MesaAyudaChart extends BarChartWidget
{
    protected static ?string $heading = 'Mesa de Ayuda Registradas';

    protected function getData(): array
    {
    

        $trend = Trend::model(MesaAyuda::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
    return [
        'datasets' => [
            [
                'label' => 'Mesa de Ayuda Registradas',
                'data' => $trend->map(fn (TrendValue $value) => $value->aggregate),
                'backgroundColor' => [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  'borderColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  'borderWidth' => 1
            ],
        ],
        'labels' => $trend->map(fn (TrendValue $value) => $value->date),
     ];
    }
}
