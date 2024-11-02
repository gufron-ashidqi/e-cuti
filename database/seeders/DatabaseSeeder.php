<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*

        ketentuan role
        1 = admin/staff
        2 = supervisor
        3 = atasan
        4 = karyawan

        */

        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 1,
            ],
            [
                'name' => 'supervisor',
                'email' => 'supervisor@gmail.com',
                'password' => Hash::make('supervisor123'),
                'role' => 2,
            ],
            [
                'name' => 'atasan',
                'email' => 'atasan@gmail.com',
                'password' => Hash::make('atasan123'),
                'role' => 3,
            ],
            [
                'name' => 'karyawan',
                'email' => 'karyawan@gmail.com',
                'password' => Hash::make('karyawan123'),
                'role' => 4,
            ]
        ]);
    }
}
