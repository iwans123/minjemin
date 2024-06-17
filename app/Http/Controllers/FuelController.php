<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fuel.index', [
            "fuel" => Fuel::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fuel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required',
            'cost_fuel' => 'required|integer|min:0',
        ]);

        $fuel = new Fuel();
        $fuel->vehicle_id = $data['vehicle_id'];
        $fuel->date = $data['date'];
        $fuel->cost_fuel = $data['cost_fuel'];
        $fuel->save();
        return back()->with('success', 'Data Berhasil Dimasukkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fuel $fuel)
    {
        $fuel = Fuel::find($fuel);

        return view('fuel.show', compact('fuel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fuel $fuel)
    {
        $fuel = Fuel::find($fuel);

        return view('fuel.edit', compact('fuel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fuel $fuel)
    {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required',
            'cost_fuel' => 'required|integer|min:0',
        ]);

        $fuel = Fuel::findOrFail($fuel);
        $fuel->vehicle_id = $data['vehicle_id'];
        $fuel->date = $data['date'];
        $fuel->cost_fuel = $data['cost_fuel'];
        $fuel->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Fuel::find($id)->delete();

        return back();
    }
}
