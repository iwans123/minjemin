<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vehicle.index', [
            "vehicles" => Vehicle::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'nopol' => 'required',
            'type' => 'required|in:orang,barang',
            'ownership' => 'required|in:sewa,nonsewa',
        ]);

        $now = Carbon::now();
        $vehicle = new Vehicle();
        $vehicle->name = $data['name'];
        $vehicle->nopol = $data['nopol'];
        $vehicle->type = $data['type'];
        $vehicle->ownership = $data['ownership'];
        $vehicle->rental_company = $request->rental_company;
        $vehicle->deadline = $request->deadline;
        if ($now->lt($vehicle->deadline)) {
            $vehicle->status = 'ready';
        } else {
            $vehicle->status = 'nonready';
        }
        $vehicle->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        $services = Service::where('vehicle_id', $id)->latest()->paginate(2);
        // $fuels = Fuel::where('vehicle_id', $id)->latest()->paginate(5);
        $fuels = Fuel::sum('cost_fuel');
        $transactions = Transaction::where('vehicle_id', $id)->where('status_transaction', 'disetujui')->paginate(5);

        return view('vehicle.show', compact('vehicle', 'services', 'fuels', 'transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicle $vehicle)
    {
        $vehicle = Vehicle::find($vehicle);

        return view('vehicle.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->name = $vehicle->name;
        $vehicle->nopol = $vehicle->nopol;
        $vehicle->type = $vehicle->type;
        $vehicle->ownership = $vehicle->ownership;
        $vehicle->rental_company = $vehicle->rental_company;
        $vehicle->deadline = $vehicle->deadline;
        $vehicle->status = $request->status;
        $vehicle->save();

        return back()->with('success', 'Data berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $vehicle)
    {
        Vehicle::find($vehicle)->delete();
    }
}
