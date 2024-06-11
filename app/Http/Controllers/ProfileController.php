<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('myprofile.index', compact('user')); // Mengarahkan ke halaman profil
    }

    public function edit()
    {
        $user = Auth::user();
        return view('myprofile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('img')) {
            // Hapus gambar profil lama jika ada
            if ($user->img) {
                Storage::disk('public')->delete($user->img);
            }
            // Upload gambar profil baru
            $imagePath = $request->file('img')->store('img', 'public');
            $user->img = $imagePath;
        }

        $user->save();

        return redirect()->route('myprofile.edit')->with('success', 'Profile updated successfully');
    }

    public function destroy()
    {
        $user = Auth::user();
        // Keluar dari sesi sebelum menghapus akun
        Auth::logout();
        // Hapus gambar profil sebelum menghapus akun jika ada
        if ($user->img) {
            Storage::disk('public')->delete($user->img);
        }
        $user->delete();

        return redirect('/')->with('success', 'Account deleted successfully');
    }
}
