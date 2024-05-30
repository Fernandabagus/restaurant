<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'MENU',
            'content'   => 'dashboard/menu'
        ];
        return view('layouts.wrapper', $data);
    }
}
