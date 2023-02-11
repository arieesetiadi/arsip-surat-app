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
        User::truncate();
        $users = [
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'name' => 'Admin Officer',
                'email' => 'admin@gmail.com',
                'phone' => '081234567890',
                'role' => 'Admin Officer',
                'created_at' => now()
            ],
            [
                'username' => 'direktur',
                'password' => Hash::make('direktur'),
                'name' => 'Direktur BUMDes',
                'email' => 'direktur@gmail.com',
                'phone' => '081234567890',
                'role' => 'Direktur BUMDes',
                'created_at' => now()
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('admin2'),
                'name' => 'Admin Officer 2',
                'email' => 'admin2@gmail.com',
                'phone' => '081234567890',
                'role' => 'Admin Officer',
                'created_at' => now()
            ],
            [
                'username' => 'direktur2',
                'password' => Hash::make('direktur2'),
                'name' => 'Direktur BUMDes 2',
                'email' => 'direktur2@gmail.com',
                'phone' => '081234567890',
                'role' => 'Direktur BUMDes',
                'created_at' => now()
            ]
        ];

        User::insert($users);
    }
}
