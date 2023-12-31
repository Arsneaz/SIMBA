<?php

namespace App\Filament\Resources\BalitaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Carbon\Carbon;

class HistorisRelationManager extends RelationManager
{
    protected static string $relationship = 'historis';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('date_record')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date_record')
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
                Tables\Columns\TextColumn::make('head_circumference')
                    ->label('Lingkar Kepala (cm)')
                    ->numeric()
                    ->searchable(),
                Tables\Columns\TextColumn::make('arm_circumference')
                    ->label('Lingkar Lengan (cm)')
                    ->numeric()
                    ->searchable(),
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
