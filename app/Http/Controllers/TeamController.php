<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'OUR TEAM',
            'content'   => 'pages/team'
        ];
        return view('layouts.wrapper', $data);
    }
}
