<?php

namespace App\Filament\Resources\WaliResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BalitasRelationManager extends RelationManager
{
    protected static string $relationship = 'balitas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_parent')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('List Data Bayi')
            ->columns([
                Tables\Columns\TextColumn::make('name_balita')
                ->label('Nama balita')
                ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                ->label('Jenis Kelamin')
                ->sortable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                ->label('Tanggal Lahir')
                ->sortable()
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
