<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JournalistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('journalists')->insert([
                'nama' => 'Nama ',
                'jk' => 'Jenis Kelamin ',
                'no_hp' => 'No Hp ',
                'alamat' => 'Alamat '
            ]);
    }
}
