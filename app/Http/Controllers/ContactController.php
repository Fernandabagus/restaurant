<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'CONTACT',
            'content'   => 'dashboard/contact'
        ];
        return view('layouts.wrapper', $data);
    }
}
