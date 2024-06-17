<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

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
        FacadesAlert::success('Success', 'Order updated successfully!');
        return redirect()->route('order-list');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        FacadesAlert::success('Success', 'Order deleted successfully!');
        return redirect()->route('order-list')->with('success', 'Order deleted successfully');
    }

    public function trash()
    {
        $orders = Order::onlyTrashed()->get();
        return view('order.trash', compact('orders'));
    }

    public function restore($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore();
        FacadesAlert::success('Success', 'Order restored successfully!');
        return redirect()->route('order.trash');
    }
    
    public function forceDelete($id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->forceDelete();
        FacadesAlert::success('Success', 'Order deleted successfully!');
        return redirect()->route('order.trash');
    }
    public function restoreAll()
    {
        Order::onlyTrashed()->restore();
        FacadesAlert::success('Success', 'All orders restored successfully!');
        return redirect()->route('order.trash');
    }

    public function forceDeleteAll()
    {
        $orders = Order::onlyTrashed()->get();
        foreach ($orders as $order) {
            $order->forceDelete();
        }
        FacadesAlert::success('Success', 'All orders permanently deleted successfully!');
        return redirect()->route('order.trash');
    }
}

