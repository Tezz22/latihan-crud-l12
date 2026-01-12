<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            Barang::create([
                'nama_barang' => $faker->word(),
                'jumlah_barang' => $faker->numberBetween(1, 100),
                'kategori_barang' => $faker->randomElement(['Elektronik', 'Pakaian', 'Makanan', 'Minuman']),
                'harga_barang' => $faker->numberBetween(10000, 1000000),
            ]);
        }
    }
}
