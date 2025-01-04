<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Testing\Fluent\Concerns\Has;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';
    protected $fillable = [
        'manajemen_data_barang_id',
        'jumlah_barang_keluar',
        'keterangan'
    ];


    public function manajemenDataBarang(): BelongsTo
    {
        return $this->belongsTo(ManajemenDataBarang::class);
    }

    protected static function booted()
    {
        static::created(function ($barangKeluar) {
            $manajemenDataBarang = $barangKeluar->manajemenDataBarang;

            if ($manajemenDataBarang) {
                // Kurangi jumlah barang keluar dari jumlah barang yang ada
                $manajemenDataBarang->decrement('jumlah_barang', $barangKeluar->jumlah_barang_keluar);
            }
        });
    }
}
