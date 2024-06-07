<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Foods;
use Illuminate\Http\Request;

class FoodUsController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        $data = [
            // 'title'     => 'Test',
            'foods'=>$foods,
            'content'   => 'users/menu/food',
        ];
        return view('users.layouts.wrapper', $data);
    }
}
