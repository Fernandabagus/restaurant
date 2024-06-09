<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Drinks;
use App\Models\Foods;
use Illuminate\Http\Request;

class FoodUsController extends Controller
{
    public function index()
    {
        $foods = Foods::paginate(4);
        $drinks = Drinks::paginate(4);
        $data = [
            // 'title'     => 'Test',
            'foods'=>$foods,
            'drinks'=>$drinks,
            'content'   => 'users/menu/index',
        ];
        return view('users.layouts.wrapper', $data);
    }
    public function indexFood()
    {
        $foods = Foods::paginate(4);
        $data = [
            // 'title'     => 'Test',
            'foods'=>$foods,
            'content'   => 'users/menu/food',
        ];
        return view('users.layouts.wrapper', $data);
    }
    public function indexDrink()
    {
        $drinks = Drinks::paginate(4);
        $data = [
            // 'title'     => 'Test',
            'drinks'=>$drinks,
            'content'   => 'users/menu/drink',
        ];
        return view('users.layouts.wrapper', $data);
    }
}
