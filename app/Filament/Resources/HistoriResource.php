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
use Carbon\Carbon;
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
                Forms\Components\TextInput::make('arm_circumference')
                    ->label('Lingkar Lengan (cm)')
                    ->numeric()
                    ->default("-"),
                Forms\Components\TextInput::make('head_circumference')
                    ->label('Lingkar Kepala (cm)')
                    ->numeric()
                    ->default("-"),
                Forms\Components\Select::make('type_immunization')
                    ->label('Tipe Imunisasi')
                    ->options([
                        'Hepatitis B' => 'Hepatitis B',
                        'BCG' => 'BCG',
                        'Polio Tetes 1' => 'Polio Tetes 1',
                        'DPT-HB-Hib 1' => 'DPT-HB-Hib 1',
                        'Polio Tetes 2' => 'Polio Tetes 2',
                        'Rota Virus (RV)1' => 'Rota virus (RV)1',
                        'PVC 1' => 'PCV 1',
                        'DPT-HB-Hib 2' => 'DPT-HB-Hib 2',
                        'Polio Tetes 3' => 'Polio Tetes 3',
                        'Rota Virus (RV)2' => 'Rota virus (RV)2',
                        'PVC2' => 'PV2',
                        'DPT-HB-Hib 3' => 'DPT-HB-Hib 3',
                        'Polio Tetes 4' => 'Polio Tetes 4',
                        'Polio Suntik (IPV) 1' => 'Polio Suntik (IPV) 1',
                        'Rota Virus (RV) 3' => 'Rota virus (RV) 3',
                        'Compak-Rubella (MR)' => 'Compak-Rubella (MR)',
                        'Polio Suntik (IPV) 2' => 'Polio Suntik (IPV) 2',
                        'Japanese Encephalitis (JE)' => 'Japanese Encephalitis (JE)',
                        'PVC 3' => 'PVC 3',
                        'DPT-HB-Hib Lanjutan' => 'DPT-HB-Hib Lanjutan',
                        'Campak-Rubella (MR) Lanjutan' => 'Campak-Rubella (MR) Lanjutan',
                        ])
                        ->default("-")
                        ->searchable()
                        ->required(),
                Forms\Components\Select::make('type_vitamins')
                    ->label('Obat Tambahan')
                    ->default("-")
                    ->options([
                        'Vitamin A' => 'Vitamin A',
                        'Obat Cacing' => 'Obat Cacing',
                    ])
                    ->native(false)
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
