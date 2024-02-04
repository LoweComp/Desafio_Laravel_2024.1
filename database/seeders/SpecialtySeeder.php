<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialty::create([
            'name' => 'Cardiologia',
            'description' => 'Trata o coração e os vasos sanguíneos',
            'value' => '400.00'
        ]);

        Specialty::create([
            'name' => 'Ortopedia',
            'description' => 'Especialidade em ossos e músculos',
            'value' => '600.00'
        ]);

        Specialty::create([
            'name' => 'Dermatologia',
            'description' => 'Cuida da saúde da pele',
            'value' => '350.00'
        ]);
    }
}
