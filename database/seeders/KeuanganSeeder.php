<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Keuangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Keuangan::create([
        //     'id_kategori'      => 1,
        //     'id_pengguna'      => 1,
        //     'jumlah'           => 10000000,
        //     'tanggal'          =>  Carbon::now(),
        //     'descripsi'        =>  'This my money',
        //     'jenis'            =>  1
        // ]);

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 20; $i++) {
            Keuangan::create([
                'id_kategori'   => Kategori::all()->random()->id,
                'id_pengguna'   => User::all()->random()->id,
                'jumlah'        => $faker->numberBetween(100000, 1000000),
                'jenis'         => rand(0, 1),
                'tanggal'       => $faker->dateTimeBetween('-1 Year', 'now'),
                'descripsi'     => $faker->words(3, true),
            ]);
        }
    }
}
