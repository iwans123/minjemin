<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'admin',
            'nip' => '1989899',
            'position' => 'low',
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ]);
        \App\Models\User::create([
            'name' => 'SUMANTO',
            'nip' => '387493874',
            'position' => 'low',
            'email' => 'sumanto@gmail.com',
            'password' => 'sumanto123'
        ]);
        \App\Models\User::create([
            'name' => 'SELAMAET',
            'nip' => '436436',
            'position' => 'high',
            'email' => 'selamet@gmail.com',
            'password' => 'selamet123'
        ]);
    }
}
