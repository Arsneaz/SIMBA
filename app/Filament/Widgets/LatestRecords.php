<?php

namespace App\Filament\Widgets;

use App\Models\Histori;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Carbon\Carbon;

class LatestRecords extends BaseWidget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Histori::query())
            ->defaultSort('created_at', 'desc')
            ->defaultPaginationPageOption(5)
            ->columns([
                Tables\Columns\TextColumn::make('balita.name_balita')
                    ->label('Nama balita')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_record')
                    ->label('Tanggal Pemeriksaan')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('days_since_date_record')
                    ->label('Hari Sejak Pemeriksaan')
                    ->getStateUsing(fn ($record) => Carbon::parse($record->date_record)->diffInDays(Carbon::now()).' hari'),
                Tables\Columns\TextColumn::make('weight_balita')
                    ->label('Berat Balita (Kg)')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height_balita')
                    ->label('Berat Balita (Kg)')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_immunization')
                    ->label('Jenis imunisasi')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_vitamins')
                    ->label('Jenis vitamins')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ]);
    }
}
