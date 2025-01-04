<?php

namespace App\Filament\Widgets;

use App\Models\BarangMasuk;
use App\Models\ManajemenDataBarang;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RiwayatBarangMasuk extends BaseWidget
{
    protected static ?int $sort = 5;

    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '15s';

    public function table(Table $table): Table
    {
        return $table
            ->query(BarangMasuk::query()->with('manajemenDataBarang'))
            ->columns([
                Tables\Columns\TextColumn::make('manajemenDataBarang.nama_barang')
                    ->label('Nama Barang')
                    ->getStateUsing(function ($record) {
                        return $record->manajemenDataBarang->nama_barang ?? '-';
                    }),
                Tables\Columns\TextColumn::make('manajemenDataBarang.kategori_barang')
                    ->label('Kategori Barang')
                    ->getStateUsing(function ($record) {
                        return $record->manajemenDataBarang->kategori_barang ?? '-';
                    }),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Masuk')
                    ->getStateUsing(function ($record) {
                        return $record->updated_at->format('d M Y H:i:s');
                    }),
            ]);
    }
}
