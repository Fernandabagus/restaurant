<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function order($id)
    {
        // dd($id);
        $data = [
            'food'      => Foods::find($id),
            // 'content'   => 'users/order/detail',
        ];
        return view('users.order.detail', $data);
    }

    public function processOrder($id)
    {
        // dd(Foods::find($id));
        $data = [
            'food'      => Foods::find($id),
            'content'   => 'users/order/detail',
        ];
        return view('users.order.detail', $data);
    }

    public function updateOrder(Request $request, $id)
    {
        // dd($id);
        $status = 'Wait';
        $food = Foods::find($id);

        // $data = [
        //     'food'      => Foods::find($id),
        //     // 'content'   => 'users/order/detail',
        // ];

        if (!$food) {
            return redirect()->back()->with('error', 'Food not found.');
        }

        $orderDate = Carbon::now()->tz('Asia/Jakarta');
        // Validasi input
        $request->validate([
            'quantity' => 'required|integer',
        ]);

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'id_food' => $food->id,
            'quantity' => $request->input('quantity'),
            'order_date' => $orderDate,
            'status' => $status
        ]);

        // return view('users.order.detail', ['order' => $order], ['food' => $food]);
        return redirect()->route('foodUser');
    }
}