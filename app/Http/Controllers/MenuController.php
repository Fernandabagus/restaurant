<?php

namespace App\Http\Controllers;

use App\Models\Drinks;
use App\Models\Foods;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $foods = Foods::all();
        $drinks = Drinks::all();

        $data = [
            'title'     => 'MENU',
            'content'   => 'users/menu/index',
            'foods' => $foods,
            'drinks' => $drinks,
        ];
        return view('users.layouts.wrapper', $data);
    }
}
