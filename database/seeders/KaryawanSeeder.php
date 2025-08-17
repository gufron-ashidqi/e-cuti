<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert([
            [
                'divisi_id' => 1,
                'nama' => 'Gufron Asidqi',
                'nik' => '123456',
                'telepon' => '08888946324',
                'jumlah_cuti' => '12',
                'tanggal_masuk' => '2023-04-25',

            ],
            [
                'divisi_id' => 1,
                'nama' => 'Agung Permana Dev',
                'nik' => '223456',
                'telepon' => '085319166215',
                'jumlah_cuti' => '12',
                'tanggal_masuk' => '2025-04-01',

            ],
        ]);
    }
}
