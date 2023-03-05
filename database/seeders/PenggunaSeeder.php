<?php

namespace Database\Seeders;

use App\Models\T_Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengguna = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'nama' => 'Robert Emerson',
                'email' => 'admin@gmail.com',
                'telepon' => '0821xxxxxxxx',
                'id_jenis_pengguna' => 1,
                'tanggal_dibuat' => now(),
                'tanggal_diubah' => null
            ],
            [
                'username' => 'direktur',
                'password' => Hash::make('direktur'),
                'nama' => 'Alexander Zverev',
                'email' => 'direktur@gmail.com',
                'telepon' => '0821xxxxxxxx',
                'id_jenis_pengguna' => 2,
                'tanggal_dibuat' => now(),
                'tanggal_diubah' => null
            ],
        ];

        $tPengguna = new T_Pengguna();
        $tPengguna->truncate();
        $tPengguna->insert($pengguna);
    }
}
