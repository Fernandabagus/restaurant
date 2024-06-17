<?php

namespace App\Http\Controllers;

use App\Models\Booktable;
use Illuminate\Http\Request;

class BooktableController extends Controller
{
    public function index()
    {
        $data = [
            'title'     => 'BOOK A TABLE',
            'content'   => 'users/booktable/index',
            'products'  => Booktable::all(),
        ];
        return view('users.layouts.wrapper', $data);
    }
}
