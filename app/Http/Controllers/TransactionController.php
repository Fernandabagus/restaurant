<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // public function index()
    // {
    //     $transactions = Transactions::all();
    //     return view('mytransaction.index', compact('transactions'));
    // }
    public function tblTransaction()
    {
        $orders = Order::orderBy('created_at', 'asc')->get();
        // $transactions = Transactions::get(); // Mengambil semua produk (tidak digunakan di view yang diberikan)
        return view('mytransaction.tblTransaction', compact('orders'));
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

        Transactions::create($request->all());

        return redirect()->route('mytransaction.index')
                         ->with('success', 'Transaction created successfully.');
    }
}


