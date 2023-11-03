<?php

namespace App\Filament\Resources\WaliResource\Pages;

use App\Filament\Resources\WaliResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWalis extends ListRecords
{
    protected static string $resource = WaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
