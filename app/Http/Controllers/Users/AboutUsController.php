<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $data = [
            // 'title'     => 'Test',
            'content'   => 'users/about/index'
        ];
        return view($data['content'], $data);
    }
}
