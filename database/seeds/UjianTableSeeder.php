<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UjianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('ujian')->insert([
                'nama_mk' => 'Mata Kuliah '.($i+1),
                'dosen' => $faker->name($gender = 'male'|'female'),
                'jumlah_soal' => $faker->numberBetween($min = 5, $max = 15),
                'keterangan' => $faker->text(),
            ]);
        }
    }
}