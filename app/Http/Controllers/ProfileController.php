<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('myprofile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('myprofile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'address' => 'required|string|max:255', 
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address; 

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('img')) { 
            $imagePath = $request->file('img')->store('img', 'public');
            $user->img = $imagePath;
        }

        $user->save();

        return redirect()->route('myprofile.index')->with('success', 'Profile updated successfully');
    }

    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully');
    }
}
