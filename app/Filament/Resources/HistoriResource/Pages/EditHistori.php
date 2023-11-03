<?php

namespace App\Filament\Resources\HistoriResource\Pages;

use App\Filament\Resources\HistoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistori extends EditRecord
{
    protected static string $resource = HistoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
