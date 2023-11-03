<?php

namespace App\Filament\Resources\HistoriResource\Pages;

use App\Filament\Resources\HistoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHistori extends ViewRecord
{
    protected static string $resource = HistoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
