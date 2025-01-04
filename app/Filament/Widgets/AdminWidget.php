<?php

namespace App\Filament\Widgets;

use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\ManajemenDataBarang;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminWidget extends BaseWidget
{
    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '15s';

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Seluruh Barang', ManajemenDataBarang::count())
                ->description(ManajemenDataBarang::count(). " Barang")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Barang Masuk', BarangMasuk::count())
                ->description(BarangMasuk::count(). " Barang Masuk")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Barang Keluar', BarangKeluar::count())
                ->description(BarangMasuk::count() . " Barang Keluar")
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
        ];
    }
}
