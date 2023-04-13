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
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Fikril Hadad Ramadhani',
                'username' => 'caesar',
                'email' => 'fikrilha099@gmail.com',
                'password' => Hash::make('271101'),
                'role' => 'admin'
            ],
            [
                'name' => 'Frisaranda Diouf Julio',
                'username' => 'diop',
                'email' => 'frisaranda@gmail.com',
                'password' => Hash::make('supardi123'),
                'role' => 'admin'
            ]
        ]);
    }
}
