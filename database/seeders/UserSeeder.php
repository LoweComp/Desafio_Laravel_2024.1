<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $userData = [
            'name' => 'Tintim',
            'email' => 'adm@hospital.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('greys2000'), // password
            'remember_token' => Str::random(10),
            'cpf' => '08612771200',
        ];

        User::updateOrCreate(['email' => $userData['email']], $userData);
    }


}
