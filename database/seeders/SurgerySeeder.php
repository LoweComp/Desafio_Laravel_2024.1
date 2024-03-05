<?php

namespace Database\Seeders;

use App\Models\Surgery;
use App\Models\Specialty;
use App\Models\Patient;
use App\Models\HealthPlan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurgerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialty = Specialty::find(3);
        $value = $specialty->value;

        // Dias
        $nextMonday = Carbon::now()->addWeek()->addDays(1);

        $nextTuesday = Carbon::now()->addWeek()->addDays(2);

        $nextWednesday = Carbon::now()->addWeek()->addDays(3);

        // Horarios

        $firstTime = Carbon::createFromTime(18, 0, 0);

        $midTime = Carbon::createFromTime(20, 0, 0);

        $eveningTime = Carbon::createFromTime(22, 0, 0);


        // Cálculo do desconto
        $patientId = 3; // ou qualquer outro id de paciente
        $patient = Patient::find($patientId);
        $finalValue = $value * (1 - $patient->healthplan->discount);

        Surgery::create([
            'start' => $nextMonday->copy()->setTimeFrom($firstTime),
            'value' => $finalValue,
            'patient_id' => 3,
            'doctor_id' => 2,
            'specialty_id' => 3,
        ]);

        Surgery::create([
            'start' => $nextTuesday->copy()->setTimeFrom($midTime),
            'value' => $finalValue,
            'patient_id' => 3,
            'doctor_id' => 2,
            'specialty_id' => 3,
        ]);

        Surgery::create([
            'start' => $nextWednesday->copy()->setTimeFrom($eveningTime),
            'value' => $finalValue,
            'patient_id' => 3,
            'doctor_id' => 2,
            'specialty_id' => 3,
        ]);
    }
}
