<?php

namespace App\Filament\Resources\WaliResource\Pages;

use App\Filament\Resources\WaliResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewWali extends ViewRecord
{
    protected static string $resource = WaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
