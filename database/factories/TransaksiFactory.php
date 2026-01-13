<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'barang_id'  => Barang::inRandomOrder()->first()->id,
            'jenis'      => $this->faker->randomElement(['masuk','keluar']),
            'qty'        => $this->faker->numberBetween(1, 20),
            'tanggal'    => $this->faker->date(),
            'keterangan' => $this->faker->sentence,
        ];
    }
}
