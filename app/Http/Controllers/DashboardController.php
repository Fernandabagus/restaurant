<?php

namespace App\Http\Controllers;

use App\Models\Drinks;
use App\Models\Foods;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalFood = Foods::count();
        $totalDrink = Drinks::count();
        
        $totalProduct = Product::count();
        $totalOrder = Order::count();
        $totalUser = User::where('role', 'user')->count();
        return view('dashboard.index', ['totalOrder'=>$totalOrder,'totalProduct' => $totalProduct,'totalFood' => $totalFood,'totalDrink' => $totalDrink,'totalUser' => $totalUser]);
    }
    public function indexAdm()
    {
        $totalFood = Foods::count();
        $totalDrink = Drinks::count();
        $totalUser = User::where('role', 'user')->count();
        
        $data = [
            'totalFood'=>$totalFood,
            'totalDrink'=>$totalDrink,
            'totalUser'=>$totalUser,
            'content'   => 'dashboard/index'
        ];
        return view('users.layouts.wrapper', $data);
    }
}
