<?php

namespace App\Filament\Widgets;

use App\Models\BarangKeluar;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BarangKeluarChart extends ChartWidget
{
    protected static ?string $heading = 'Barang Keluar';

    protected static string $color = 'danger';

    protected static bool $isLazy = true;

    protected static ?string $pollingInterval = '15s';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $data = BarangKeluar::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(jumlah_barang_keluar) as aggregate')
        )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Pastikan nilai data dibulatkan dan tidak negatif
        $filteredData = $data->map(function ($item) {
            return [
                'month' => $item->month,
                'aggregate' => max(0, round($item->aggregate)),
            ];
        });
        return [
            'datasets' => [
                [
                    'label' => 'Barang Keluar',
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
