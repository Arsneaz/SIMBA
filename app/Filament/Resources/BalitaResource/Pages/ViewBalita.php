<?php

namespace App\Filament\Resources\BalitaResource\Pages;

use App\Filament\Resources\BalitaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBalita extends ViewRecord
{
    protected static string $resource = BalitaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
