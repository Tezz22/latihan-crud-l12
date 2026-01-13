<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_id'     => Supplier::inRandomOrder()->first()->id,
            'nama_barang'     => $this->faker->word,
            'jumlah_barang'   => $this->faker->numberBetween(1, 100),
            'kategori_barang' => $this->faker->randomElement(['Elektronik','ATK','Makanan']),
            'harga_barang'    => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
