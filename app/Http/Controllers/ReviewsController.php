<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Reviews;


class ReviewsController extends Controller
{
    public function index()
    {
        $userAuth = Auth::user()->id;
        $review = Reviews::where('user_id', $userAuth)->get();
        // dd($menu);
        $user = Auth::user()->id;
        $data = [
            // 'title'     => 'Test',
            'user'      => $user,
            'reviews'      => $review,
            // 'reviews'   => $user->reviews,
            'content'   => 'users/review/my-review'
        ];
        return view('users.layouts.wrapper', $data);
    }

    public function create($id)
    {
        $menu = Product::find($id);
        $data = [
            'content'   => 'users/review/index',
            'menu'      => $menu
        ];
        return view('users.layouts.wrapper', $data);
    }

    public function store(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'id_product' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $user = $request->user();
        $review = $user->reviews()->create($request->all());
        // return redirect()->route('our-menu')->with('success', 'Review successfully added!')->with('review', $review);
        return redirect()->route('our-menu')->with('success', 'Review successfully added!')->with('review', $review);
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