<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at','asc')->get(); 
        $product = Product::get(); 
        return view('order.index', ['orders' => $orders], ['product' => $product]);
    }
}
