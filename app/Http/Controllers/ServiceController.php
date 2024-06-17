<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('service.index', [
            "service" => Service::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required',
        ]);

        if (Service::exists()) {
            $serviceLatest = Service::latest()->first();
            $serviceLatest->vehicle_id = $serviceLatest->vehicle_id;
            $serviceLatest->date = $serviceLatest->date;
            $serviceLatest->status = 'sudah';
            $serviceLatest->save();
        }

        $service = new Service();
        $service->vehicle_id = $data['vehicle_id'];
        $service->date = $data['date'];
        $service->status = 'belum';
        $service->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $service = Service::find($service);

        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $service = Service::find($service);

        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required',
            'status' => 'required|in:belum,sudah,',
        ]);

        $service = Service::findOrFail($service);
        $service->vehicle_id = $data['vehicle_id'];
        $service->date = $data['date'];
        $service->status = $data['status'];
        $service->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Service::find($id)->delete();

        return back();
    }
}
