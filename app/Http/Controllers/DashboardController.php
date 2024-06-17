<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            "vehicle" => Vehicle::selectRaw('count(*) as total')->first(),
            "user" => User::role('user')->selectRaw('count(*) as total')->first()
        ]);
    }
    public function chart()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        // return view('dashboard', [
        //     "transactions" => Transaction::where('status_transaction')->get()
        // ]);

        $monthlyTransactions = Transaction::where('status_transaction', 'disetujui')->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Format data untuk chart
        $labelsTransaction = $monthlyTransactions->pluck('month')->map(function ($month) {
            return Carbon::createFromFormat('Y-m', $month)->format('F Y');
        });

        $valuesTransaction = $monthlyTransactions->pluck('total');

        return response()->json([
            'labelsTransaction' => $labelsTransaction,
            'valuesTransaction' => $valuesTransaction
        ]);
    }
}
