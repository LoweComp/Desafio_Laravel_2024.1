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
            'name' => 'adminstrador',
            'email' => 'adm@hospital.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('alprazolan'), // password
            'remember_token' => Str::random(10),
        ]);

        User::factory()->count(36)->create();

    }


}
