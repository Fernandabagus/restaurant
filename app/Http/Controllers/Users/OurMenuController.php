<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurMenuController extends Controller
{
    public function index()
    {
        $data = [
            // 'title'     => 'Test',
            'content'   => 'users/menu/index'
        ];
        return view('users.layouts.wrapper', $data);
    }
}
