<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
{
    $orders = Order::orderBy('created_at', 'asc')->get();
    $products = Product::get(); // Mengambil semua produk (tidak digunakan di view yang diberikan)
    return view('order.index', compact('orders'));
}

public function edit(Order $order)
{
    return view('order.edit', compact('order'));
}


    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $order->update([
            'status' => $request->status,
            // tambahkan field lain yang perlu diupdate
        ]);

        return redirect()->route('order-list')->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order-list')->with('success', 'Order deleted successfully');
    }
}

