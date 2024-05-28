<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return view('orderdetails.index', compact('orderDetails'));
    }

    public function create()
    {
        return view('orderdetails.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        OrderDetail::create($request->all());
        return redirect()->route('orderdetails.index');
    }

    public function show(OrderDetail $orderDetail)
    {
        return view('orderdetails.show', compact('orderDetail'));
    }

    public function edit(OrderDetail $orderDetail)
    {
        return view('orderdetails.edit', compact('orderDetail'));
    }

    public function update(Request $request, OrderDetail $orderDetail)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderDetail->update($request->all());
        return redirect()->route('orderdetails.index');
    }

    public function destroy(OrderDetail $orderDetail)
    {
        $orderDetail->delete();
        return redirect()->route('orderdetails.index');
    }
}
