<?php

namespace App\Http\Controllers;

use App\Models\HealthPlan;
use Illuminate\Http\Request;

class HealthPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthPlans = HealthPlan::all();
        return view('healthplan.index', ['healthPlans' => $healthPlans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('healthplan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->input());
        HealthPlan::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'discount' => $request->input('discount')
        ]);
        return redirect(route('healthplan.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $healthPlan = HealthPlan::find($id);
        return view('healthplan.show', ['healthPlan' => $healthPlan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('healthplan.edit', ['healthPlan' => HealthPlan::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $healthPlan = HealthPlan::find($id);
        $healthPlan->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'discount' => $request->input('discount')
        ]);
        return redirect(route('healthplan.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $healthPlan = HealthPlan::find($id);
        $healthPlan->delete();
        return redirect(route('healthplan.index'));
    }

}
