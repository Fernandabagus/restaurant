<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reviews;


class ReviewsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data = [
            // 'title'     => 'Test',
            'reviews'   => $user->reviews,
            'content'   => 'users/review/index'
        ];
        return view('users.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_product' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $user = $request->user();
        $user->reviews()->create($request->all());

        return redirect()->route('reviewUsers');
    }

    public function reviewsAdmin()
    {
        $reviews = Reviews::with('user')->get();
        $data = [
            'reviews' => $reviews,
        ];
        return view('reviews.tableReviews', $data);
    }

}
