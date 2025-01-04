<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\ManajemenDataBarang;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Exports\ManajemenDataBarangExporter;
use App\Filament\Resources\ManajemenDataBarangResource\Pages;
use App\Filament\Resources\ManajemenDataBarangResource\RelationManagers;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction as TablesExportBulkAction;

class ManajemenDataBarangResource extends Resource
{
    protected static ?string $model = ManajemenDataBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $pluralLabel = 'Manajemen Data Barang';

    protected static ?int $navigationGroupSort = 1;

    protected static ?string $slug = 'Manajemen-Data-Barang';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required(),
                TextInput::make('kode_barang')
                    ->label('Kode Barang')
                    ->numeric()
                    ->required(),
                TextInput::make('kategori_barang')
                    ->label('Kategori Barang')
                    ->required(),
                TextInput::make('harga_barang')
                    ->label('Harga Barang')
                    ->numeric()
                    ->required(),
                TextInput::make('jumlah_barang')
                    ->label('Jumlah Barang')
                    ->numeric()
                    ->required(),
                TextInput::make('deskripsi_barang')
                    ->label('Deskripsi Barang')
                    ->required(),
                Textarea::make('lokasi_barang')
                    ->label('Lokasi Barang')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("nama_barang")
                    ->searchable(),
                TextColumn::make("kode_barang")
                    ->searchable(),
                TextColumn::make("kategori_barang")
                    ->searchable(),
                TextColumn::make("harga_barang")
                    ->money("IDR"),
                TextColumn::make('jumlah_barang')
                    ->label('Jumlah Barang')
                    ->sortable(),
                TextColumn::make("deskripsi_barang")
                    ->wrap(),
                TextColumn::make("lokasi_barang")
                    ->wrap(),
                TextColumn::make("created_at")
                    ->dateTime(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])
                    ->button()
                    ->label('Actions')
            ])
            ->filters([])
            ->defaultSort('nama_barang', 'asc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    TablesExportBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListManajemenDataBarang::route('/'),
            'create' => Pages\CreateManajemenDataBarang::route('/create'),
            'View' => Pages\ViewManajemenDataBarang::route('/{record}'),
            'edit' => Pages\EditManajemenDataBarang::route('/{record}/edit'),
        ];
    }
}
