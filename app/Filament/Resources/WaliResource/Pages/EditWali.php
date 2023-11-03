<?php

namespace App\Filament\Resources\WaliResource\Pages;

use App\Filament\Resources\WaliResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWali extends EditRecord
{
    protected static string $resource = WaliResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
