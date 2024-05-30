<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'ABOUT',
            'content'   => 'dashboard/about'
        ];
        return view('layouts.wrapper', $data);
    }
}
