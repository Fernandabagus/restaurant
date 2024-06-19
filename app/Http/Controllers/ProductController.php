<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'MENU',
            'content'   => 'users/product/index',
            'products'  => Product::all(),
        ];
        return view('users.layouts.wrapper', $data);
    }
}
