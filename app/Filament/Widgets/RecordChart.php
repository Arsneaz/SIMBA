<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Histori;

class RecordChart extends ChartWidget
{
    protected static ?string $heading = 'Chart Jumlah Record Imunisasi Balita Per-Bulan';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Trend::model(Histori::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Grafik Pertambahan Data Record Balita Per-Bulan',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];


    }

    protected function getType(): string
    {
        return 'bar';
    }
}
