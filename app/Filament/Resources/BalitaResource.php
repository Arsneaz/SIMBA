<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BalitaResource\Pages;
use App\Filament\Resources\BalitaResource\RelationManagers;
use App\Models\Balita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BalitaResource extends Resource
{
    protected static ?string $model = Balita::class;

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';

    protected static ?string $navigationLabel = 'Balita';

    protected static ?string $navigationGroup = 'Sistem Informasi Manajemen Bayi dan Imunisasi (SIMBA)';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Nama Orang Tua')
                    ->schema([
                        Forms\Components\Select::make('wali_id')
                            ->label('Nama orang tua')
                            ->relationship(name: 'wali', titleAttribute: 'name_parent')
                            ->searchable()
                            ->preload()
                            ->columnSpan(2),
                    ])->columns(2),
                Forms\Components\Section::make('Biodata Balita')
                    ->schema([
                        Forms\Components\TextInput::make('name_balita')
                            ->label('Nama balita')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->required()
                            ->options([
                                'L' => 'Laki-Laki',
                                'P' => 'Perempuan'
                            ])->native(false),
                        Forms\Components\DateTimePicker::make('date_of_birth')
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->required()
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_balita')
                    ->label('Nama balita')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Jenis Kelamin (L/P)')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->label('Tanggal lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBalitas::route('/'),
            'create' => Pages\CreateBalita::route('/create'),
            'view' => Pages\ViewBalita::route('/{record}'),
            'edit' => Pages\EditBalita::route('/{record}/edit'),
        ];
    }
}
