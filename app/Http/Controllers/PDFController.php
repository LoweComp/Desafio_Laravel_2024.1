<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthPlan;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Surgery;
use App\Models\Specialty;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{

    public function index(){
        $doctors = Auth::guard('doctor')->user();
        $doctorId = Auth::guard('doctor')->id();
        $surgeries = Surgery::where('doctor_id', $doctorId)->get();
        $specialties = Specialty::all();
        $patients = Patient::all();
        $healthplans = healthPlan::all();
        echo "ALOU";

    $pdf = Pdf::loadView('pdf.index', compact('patients', 'surgeries', 'specialties', 'doctors'));

    return $pdf->setPaper('A4')->stream('Relatorio.pdf');
    }

}
