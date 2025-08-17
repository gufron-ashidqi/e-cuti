<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
                'karyawan_id' => null,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'role' => 1,
            ],
            [
                'karyawan_id' => null,
                'name' => 'supervisor',
                'email' => 'supervisor@gmail.com',
                'password' => Hash::make('123'),
                'role' => 2,
            ],
            [
                'karyawan_id' => null,
                'name' => 'atasan',
                'email' => 'atasan@gmail.com',
                'password' => Hash::make('123'),
                'role' => 3,
            ],
            [
                'karyawan_id' => '1',
                'name' => 'Gufron Asidqi',
                'email' => 'gufron@gmail.com',
                'password' => Hash::make('123'),
                'role' => 4,
            ],
            [
                'karyawan_id' => '2',
                'name' => 'Agung Permana',
                'email' => 'agung@gmail.com',
                'password' => Hash::make('123'),
                'role' => 4,
            ]

        ]);
    }
}
