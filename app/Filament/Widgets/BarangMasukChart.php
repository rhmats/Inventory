<?php

namespace App\Filament\Widgets;

use App\Models\BarangMasuk;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BarangMasukChart extends ChartWidget
{
    protected static ?string $heading = 'Barang Masuk';

    protected static string $color = 'success';

    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '15s';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = BarangMasuk::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(jumlah_barang_masuk) as aggregate')
        )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Pastikan nilai data dibulatkan dan tidak negatif
        $filteredData = $data->map(function ($item) {
            return [
                'month' => $item->month,
                'aggregate' => max(0, round($item->aggregate)), // Pastikan nilai minimum adalah 0 dan dibulatkan
            ];
        });
        return [
            'datasets' => [
                [
                    'label' => 'Barang Masuk',
                    'data' => $filteredData->pluck('aggregate')->toArray(), // Ambil nilai yang sudah difilter
                ],
            ],
            'labels' => $filteredData->pluck('month')->map(function ($month) {
                return date('M', mktime(0, 0, 0, $month, 1)); // Ubah angka bulan menjadi nama bulan
            })->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
