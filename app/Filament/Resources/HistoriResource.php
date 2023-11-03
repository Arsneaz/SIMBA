<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistoriResource\Pages;
use App\Filament\Resources\HistoriResource\RelationManagers;
use App\Models\Histori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoriResource extends Resource
{
    protected static ?string $model = Histori::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationLabel = 'Record Kesehatan Balita';

    protected static ?string $navigationGroup = 'Sistem Informasi Manajemen Bayi dan Imunisasi (SIMBA)';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Record Data Balita')
                    ->schema([
                        Forms\Components\Select::make('balita_id')
                            ->label('Nama balita')
                            ->relationship(name: 'balita', titleAttribute: 'name_balita')
                            ->searchable()
                            ->preload()
                            ->columnSpan(2),
                    ])->columns(2),
                Forms\Components\DateTimePicker::make('date_record')
                    ->label('Tanggal Pemerisksaan')
                    ->displayFormat('d/m/Y')
                    ->required(),
                Forms\Components\TextInput::make('weight_balita')
                    ->label('Berat Balita (kg)')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('height_balita')
                    ->label('Tinggi Balita (cm)')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('type_immunization')
                    ->label('Tipe Imunisasi')
                    ->required(),
                Forms\Components\TextInput::make('type_vitamins')
                    ->label('Tipe Vitamin')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('balita.name_balita')
                    ->label('Nama balita')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_record')
                    ->label('Tanggal Pemeriksaan')
                    ->date()
                    ->sortable(),
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHistoris::route('/'),
            'create' => Pages\CreateHistori::route('/create'),
            'view' => Pages\ViewHistori::route('/{record}'),
            'edit' => Pages\EditHistori::route('/{record}/edit'),
        ];
    }
}
