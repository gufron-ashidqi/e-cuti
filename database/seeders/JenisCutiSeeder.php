<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_cuti')->insert([
            [
                'nama' => 'Tahunan',
            ],
            [
                'nama' => 'Khusus',
            ],
            [
                'nama' => 'Melahirkan',
            ],
        ]);
    }
}
