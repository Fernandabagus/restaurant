<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'BOOKING',
            'content'   => 'dashboard/booking'
        ];
        return view('layouts.wrapper', $data);
    }
}
