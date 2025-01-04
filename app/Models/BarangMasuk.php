<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $fillable = [
        'manajemen_data_barang_id',
        'jumlah_barang_masuk',
        'keterangan'
    ];

    public function manajemenDataBarang(): BelongsTo
    {
        return $this->belongsTo(ManajemenDataBarang::class);
    }

    protected static function booted()
    {
        static::created(function ($barangMasuk) {
            $manajemenDataBarang = $barangMasuk->manajemenDataBarang;

            if ($manajemenDataBarang) {
                // Tambahkan jumlah barang masuk ke jumlah barang yang ada
                $manajemenDataBarang->increment('jumlah_barang', $barangMasuk->jumlah_barang_masuk);
            }
        });
    }
}
