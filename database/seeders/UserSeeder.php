<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $users = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'name' => 'Admin Officer',
                'email' => 'admin@gmail.com',
                'phone' => '081234567890',
                'role' => 'admin',
                'created_at' => now()
            ],
            [
                'username' => 'direktur',
                'password' => Hash::make('direktur'),
                'name' => 'Direktur BUMDes',
                'email' => 'direktur@gmail.com',
                'phone' => '081234567890',
                'role' => 'direktur',
                'created_at' => now()
            ]
        ];

        User::insert($users);
    }
}
