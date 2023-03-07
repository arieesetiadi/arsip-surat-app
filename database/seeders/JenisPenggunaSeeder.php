<?php

namespace Database\Seeders;

use App\Models\T_JenisPengguna;
use Illuminate\Database\Seeder;

class JenisPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisPengguna = [
            ['nama' => 'Admin Officer'],
            ['nama' => 'Direktur BUMDes']
        ];
        
        $tJenisPengguna = new T_JenisPengguna();
        $tJenisPengguna->truncate();
        $tJenisPengguna->insert($jenisPengguna);
    }
}
