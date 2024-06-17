<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaction.index', [
            "transactions" => Transaction::get(),
            "employees" => User::role('user')->get(),
            "vehicles" => Vehicle::where('status', 'ready')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_nip' => 'required',
            'customer_telp' => 'required',
            'customer_name' => 'required',
            'vehicle_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'userLow_id' => 'required',
            'userHigh_id' => 'required',
            'description' => 'nullable',
        ]);

        $transaction = new Transaction();
        $transaction->customer_name = $data['customer_name'];
        $transaction->customer_nip = $data['customer_nip'];
        $transaction->customer_telp = $data['customer_telp'];
        $transaction->vehicle_id = $data['vehicle_id'];
        $transaction->date_start = $data['date_start'];
        $transaction->date_end = $data['date_end'];
        $transaction->status_transaction = 'proses';
        $transaction->userLow_id = $data['userLow_id'];
        $transaction->status_userLow = 'proses';
        $transaction->userHigh_id = $data['userHigh_id'];
        $transaction->status_userHigh = 'proses';
        $transaction->description = $data['description'];
        $transaction->save();

        $vehicle = Vehicle::findOrFail($transaction->vehicle_id);
        $vehicle->name = $vehicle->name;
        $vehicle->nopol = $vehicle->nopol;
        $vehicle->type = $vehicle->type;
        $vehicle->ownership = $vehicle->ownership;
        $vehicle->rental_company = $vehicle->rental_company;
        $vehicle->deadline = $vehicle->deadline;
        if ($transaction->status_transaction == 'ditolak') {
            $vehicle->status = 'ready';
        } else {
            $vehicle->status = 'nonready';
        }
        $vehicle->save();

        return back()->with('success', 'Data Berhasil Dimasukkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction = Transaction::find($transaction);

        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $transaction = Transaction::find($transaction);

        return view('transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'customer_name' => 'required',
            'customer_nip' => 'required',
            'customer_telp' => 'required',
            'vehicle_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'userLow_id' => 'required',
            'userHigh_id' => 'required',
            'description' => 'nullable',
        ]);

        $transaction = Transaction::findOrFail($transaction);
        $transaction->customer_name = $data['customer_name'];
        $transaction->customer_nip = $data['customer_nip'];
        $transaction->customer_telp = $data['customer_telp'];
        $transaction->vehicle_id = $data['vehicle_id'];
        $transaction->date_start = $data['date_start'];
        $transaction->date_end = $data['date_end'];
        $transaction->status_transaction = 'proses';
        $transaction->userLow_id = $data['userLow_id'];
        $transaction->status_userLow = 'proses';
        $transaction->userHigh_id = $data['userHigh_id'];
        $transaction->status_userHigh = 'proses';
        $transaction->description = $data['description'];
        $transaction->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $vehicle = Vehicle::findOrFail($transaction->vehicle_id);
        $vehicle->name = $vehicle->name;
        $vehicle->nopol = $vehicle->nopol;
        $vehicle->type = $vehicle->type;
        $vehicle->ownership = $vehicle->ownership;
        $vehicle->rental_company = $vehicle->rental_company;
        $vehicle->deadline = $vehicle->deadline;
        $vehicle->status = 'ready';
        $vehicle->save();

        $transaction->delete();

        return back()->with('success', 'Data Berhasil dihapus');
    }
}
