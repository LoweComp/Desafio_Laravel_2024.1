<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surgery;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Specialty;
use App\Models\HealthPlan;
use Illuminate\Support\Facades\Auth;

class SurgeryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Auth::guard('patient')->user();
        $patientId = Auth::guard('patient')->id();
        $surgeries = Surgery::where('patient_id', $patientId)->get();
        $specialties = Specialty::all();
        $doctors = Doctor::all();
        return view('surgery.index', compact('patients', 'surgeries', 'specialties', 'doctors'));
    }

    public function indexDOC()
    {
        $doctors = Auth::guard('doctor')->user();
        $doctorId = Auth::guard('doctor')->id();
        $surgeries = Surgery::where('doctor_id', $doctorId)->get();
        $specialties = Specialty::all();
        $patients = Patient::all();
        return view('surgery.indexDOC', compact('patients', 'surgeries', 'specialties', 'doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patientId = Auth::guard('patient')->id();
        $specialties = Specialty::all();
        $doctors = Doctor::all();
        $healthplans = HealthPlan::all();
        return view('surgery.create', compact('patientId', 'specialties', 'doctors', 'healthplans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'specialty_id' => 'required|exists:specialties,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        Surgery::create([
            'start' => $request->start,
            'value' => $request->value,
            'patient_id' => Auth::guard('patient')->id(),
            'doctor_id' => $request->doctor_id,
            'specialty_id' => $request->specialty_id,
        ]);

        return redirect()->route('surgery.index')->with('success', 'Consulta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surgery = Surgery::findOrFail($id);
        $surgery->delete();
        return redirect(route('patient.dashboard'))->with('success', 'Cirurgia excluída com sucesso!');
    }
}
