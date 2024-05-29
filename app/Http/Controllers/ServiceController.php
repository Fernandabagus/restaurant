<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'SERVICE',
            'content'   => 'dashboard/service'
        ];
        return view('layouts.wrapper', $data);
    }
}