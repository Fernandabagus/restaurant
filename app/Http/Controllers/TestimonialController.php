<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'TESTIMONIAL',
            'content'   => 'dashboard/testimonial'
        ];
        return view('layouts.wrapper', $data);
    }
}
