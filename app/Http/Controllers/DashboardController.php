<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'HOME',
            'content'   => 'dashboard/index'
        ];
        return view('layouts.wrapper', $data);
    }
}
