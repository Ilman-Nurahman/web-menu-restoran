<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kasir 1
        User::create([
            'name' => 'Kasir Utama',
            'email' => 'kasir@nusantararamen.com',
            'password' => Hash::make('admin123'),
            'role' => 'kasir',
        ]);

        // Kasir 2
        User::create([
            'name' => 'Kasir Shift 2',
            'email' => 'kasir2@nusantararamen.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);
    }
}