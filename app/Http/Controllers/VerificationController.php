<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function verificationLow()
    {
        return view('verification.low', [
            "transactions" => Transaction::where('userLow_id', Auth::user()->id)->latest()->get(),
        ]);
    }

    public function verificationHigh()
    {
        return view('verification.high', [
            "transactions" => Transaction::where('userHigh_id', Auth::user()->id)->latest()->get(),
        ]);
    }

    public function updateLow(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->customer_name = $transaction->customer_name;
        $transaction->customer_nip = $transaction->customer_nip;
        $transaction->customer_telp = $transaction->customer_telp;
        $transaction->vehicle_id = $transaction->vehicle_id;
        $transaction->date_start = $transaction->date_start;
        $transaction->date_end = $transaction->date_end;
        $transaction->userLow_id = $transaction->userLow_id;
        $transaction->status_userLow = $data['status'];
        $transaction->userHigh_id = $transaction->userHigh_id;
        if ($transaction->status_userLow == 'ditolak') {
            $transaction->status_userHigh = 'ditolak';
            $transaction->status_transaction = 'ditolak';
        } elseif ($transaction->status_userLow == 'disetujui') {
            $transaction->status_userHigh = 'proses';
            $transaction->status_transaction = 'proses';
        }
        $transaction->description = $transaction->description;
        $transaction->save();

        // $now = Carbon::now();
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

        return back()->with('success', 'data berhasil diverifikasi');
    }

    public function updateHigh(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $transaction = Transaction::findOrFail($id);
        $transaction->customer_name = $transaction->customer_name;
        $transaction->customer_nip = $transaction->customer_nip;
        $transaction->customer_telp = $transaction->customer_telp;
        $transaction->vehicle_id = $transaction->vehicle_id;
        $transaction->date_start = $transaction->date_start;
        $transaction->date_end = $transaction->date_end;
        $transaction->userLow_id = $transaction->userLow_id;
        $transaction->status_userHigh = $data['status'];
        $transaction->userHigh_id = $transaction->userHigh_id;
        if ($transaction->status_userHigh == 'ditolak') {
            $transaction->status_userLow = 'ditolak';
            $transaction->status_transaction = 'ditolak';
        } elseif ($transaction->status_userHigh == 'disetujui') {
            $transaction->status_userLow = 'disetujui';
            $transaction->status_transaction = 'disetujui';
        }
        $transaction->description = $transaction->description;
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

        return back()->with('success', 'data berhasil diverifikasi');
    }
}
