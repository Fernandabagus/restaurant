<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('mytransaction.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string|max:255',
            'order_id' => 'required|integer',
            'transaction_date' => 'required|date',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        Transaction::create($request->all());

        return redirect()->route('mytransaction.index')
                         ->with('success', 'Transaction created successfully.');
    }
}


