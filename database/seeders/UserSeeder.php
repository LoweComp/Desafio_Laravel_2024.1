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
        User::create([
            'name' => 'Ronaldo',
            'email' => 'adm@hospital.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('alprazolan'), // password
            'remember_token' => Str::random(10),
            'birth_date' => fake()->date('Y-m-d'),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'CPF' => '08612771200',
            'user_type' => 'adm'
        ]);

        User::factory()->count(20)->create();

    }


}
