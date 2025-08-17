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
                'nama' => 'gufron sodikin',
                'nik' => '12345',
                'telepon' => '08888946324',
                'jumlah_cuti' => '12',
                'tanggal_masuk' => '2023-04-25',

            ],
            [
                'divisi_id' => 1,
                'nama' => 'jordan',
                'nik' => '22345',
                'telepon' => '088884533233',
                'jumlah_cuti' => '12',
                'tanggal_masuk' => '2025-04-01',

            ],
        ]);
    }
}
