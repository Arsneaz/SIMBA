<?php

namespace App\Filament\Widgets;

use App\Models\Balita;
use App\Models\Wali;
use App\Models\Histori;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{

    protected static ?int $sort = 2;

    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Balita', Balita::count())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->description('Catatan Jumlah Bayi')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total Orang Tua Wali', Wali::count())
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->description('Catatan Wali Bayi')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total Catatan Record Balita', Histori::count())
                ->description('Catatan Imunisasi Bayi')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
        ];
    }
}
