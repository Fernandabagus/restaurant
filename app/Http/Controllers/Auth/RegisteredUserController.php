<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric', 'digits_between:11,15'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Check if the image file is uploaded
        if ($request->hasFile('img')) {
            // Store the image and get the path
            $imagePath = $request->file('img')->store('public/img');
        } else {
            // Set a default value if no image is uploaded
            $imagePath = 'default/path/to/image.jpg';
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'img' => $imagePath, // Assign the image path to the 'img' column
        ]);

        // Debugging: Check if the user is created successfully
        if ($user) {
            event(new Registered($user));
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } else {
            // Return back with an error message
            return back()->with('error', 'User registration failed. Please try again.');
        }
    }
}
