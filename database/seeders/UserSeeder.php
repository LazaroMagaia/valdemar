<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Lazaro Magaia',
            'email' => 'llmagaia2@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Cria 10 usuários aleatórios usando a factory
        User::factory(10)->create();
    }
}
