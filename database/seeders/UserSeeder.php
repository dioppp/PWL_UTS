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
                'email' => 'fikrilha099@gmail.com',
                'password' => Hash::make('271101'),
            ],
            [
                'name' => 'Frisaranda Diouf Julio',
                'email' => 'frisaranda@gmail.com',
                'password' => Hash::make('supardi123'),
            ]
        ]);
    }
}
