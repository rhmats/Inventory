<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ManajemenDataBarang extends Model
{
    use HasFactory;

    protected $table = 'manajemen_data_barang';
    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kategori_barang',
        'harga_barang',
        'jumlah_barang',
        'deskripsi_barang',
        'lokasi_barang',
    ];

    public function barangMasuk(): HasMany
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barangKeluar(): HasMany
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function updateJumlahBarang()
    {
        $totalBarangMasuk = $this->barangMasuk()->sum('jumlah_barang_masuk');
        $totalBarangKeluar = $this->barangKeluar()->sum('jumlah_barang_keluar');

        // Menggunakan abs() agar hasilnya selalu positif (jika ada masalah dalam data)
        $jumlahBarang = (int) $totalBarangMasuk - (int) $totalBarangKeluar;

        // Cek jika nilai jumlah_barang valid
        if (is_numeric($jumlahBarang)) {
            // Update jumlah_barang dengan nilai yang benar
            $this->update(['jumlah_barang' => $jumlahBarang]);
        } else {
            // Jika terjadi kesalahan, berikan nilai default atau 0
            $this->update(['jumlah_barang' => 0]);
        }
    }
}
