<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        $registrar = User::create([
            'name' => 'Jane Doe',
            'email' => 'registrar@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'registrar'
        ]);

        $officerr = User::create([
            'name' => 'Bobby Doe',
            'email' => 'officer@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'officer'
        ]);
    }
}
