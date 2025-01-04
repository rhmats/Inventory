<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ManajemenDataBarang>
 */
class ManajemenDataBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => $this->faker->name(),
            'kode_barang' => $this->faker->unique()->randomNumber(),
            'kategori_barang' => $this->faker->name(),
            'harga_barang' => $this->faker->randomNumber(),
            'jumlah_barang' => $this->faker->randomNumber(),
            'deskripsi_barang' => $this->faker->sentence(),
            'lokasi_barang' => $this->faker->city(),
            'lokasi_barang' => $this->faker->address(),
            'lokasi_barang' => $this->faker->streetAddress(),

        ];
    }
}
