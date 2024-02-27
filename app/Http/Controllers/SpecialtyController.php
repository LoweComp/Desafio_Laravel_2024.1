<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialty.index', ['specialties' => $specialties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specialty.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Specialty::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'value' => $request->input('value')
        ]);
        return redirect(route('specialty.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $specialty = Specialty::find($id);
        return view('specialty.show', ['specialty' => $specialty]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('specialty.edit', ['specialty' => Specialty::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $specialty = Specialty::find($id);
        $specialty->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'value' => $request->input('value')
        ]);
        return redirect(route('specialty.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $specialty = Specialty::find($id);
        $specialty->delete();
        return redirect(route('specialty.index'));
    }
}
