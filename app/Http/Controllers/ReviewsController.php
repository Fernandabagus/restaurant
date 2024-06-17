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
    public function index($id)
    {
        $menu = Product::find($id);
        $user = Auth::user()->id;
        $data = [
            // 'title'     => 'Test',
            'user'      => $user,
            'menu'      => $menu,
            // 'reviews'   => $user->reviews,
            'content'   => 'users/review/index'
        ];
        return view('users.layouts.wrapper', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
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

    // public function userIndex()
    // {
    //     $myReviews = Reviews::all();
    //     $data = [
    //         'user'      => $myReviews,
    //         'content'   => 'users/review/my-review'
    //     ];
    //     return view('users.layouts.wrapper', $data);
    // }

    public function userIndex()
    {
        $user = auth()->user();
        $userAuth = Auth::user()->id;
        $reviews = Reviews::where('user_id', $userAuth)->get();
        $data = [
            // 'title'     => 'Test',
            'reviews'   => $reviews,
            'content'   => 'users/review/my-review'
        ];
        return view('users.layouts.wrapper', $data);
    }

}
