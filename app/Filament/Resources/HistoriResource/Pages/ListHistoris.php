<?php

namespace App\Filament\Resources\HistoriResource\Pages;

use App\Filament\Resources\HistoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoris extends ListRecords
{
    protected static string $resource = HistoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
