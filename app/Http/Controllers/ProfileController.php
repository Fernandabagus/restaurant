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

    protected function create(array $data)
    {
        $path = isset($data['img']) ? $data['img']->store('public/profile-image') : null;

        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address'=>['address'],
            'password' => Hash::make($data['password']),
            'img' => $path,
        ]);
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

        // dd($request);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('img')) {

            $img = $request->file('img');
            $img->storeAs('public/profile-image', $img->hashName());

            Storage::delete('public/profile-image/' . $user->img);

            $user->update([
                'img'     => $img->hashName(),
                'name'   => $request->name,
                'phone'   => $request->phone,
                'address'   => $request->address,
            ]);

        } else {

            $user->update([
                'name'   => $request->name,
                'phone'   => $request->phone,
                'address'   => $request->address,
            ]);

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
