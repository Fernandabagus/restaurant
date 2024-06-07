<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $data = [
            // 'title'     => 'Test',
            'content'   => 'users/home/index'
        ];
        return view('users.layouts.wrapper', $data);
    }
}
