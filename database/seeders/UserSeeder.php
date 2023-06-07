<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // [
            //     'idUser' => 'ADM001',
            //     'nama' => 'Sely Ruli Amanda',
            //     'umur' => 25,
            //     'alamat' => 'Jalan Kenanga no 53, Malang',
            //     'username' => 'admin1',
            //     'password' => bcrypt('admin'),
            //     'noTelp' => '085733744803',
            //     'role' => '1'

            // ],
            // [
            //     'idUser' => 'PTG001',
            //     'nama' => 'Ulfi Izza',
            //     'umur' => 23,
            //     'alamat' => 'Jalan Palem no 21, Malang',
            //     'username' => 'petugas1',
            //     'password' => bcrypt('petugas'),
            //     'noTelp' => '082334576889',
            //     'role' => '0'
            // ],
            [
                'idUser' => 'ADM002',
                'nama' => 'Abu Bakar',
                'umur' => 28,
                'alamat' => 'Jalan Mahoni no 12, Malang',
                'username' => 'admin2',
                'password' => bcrypt('admin2'),
                'noTelp' => '088765446318',
                'role' => '1'

            ],
        ]);
    }
}
