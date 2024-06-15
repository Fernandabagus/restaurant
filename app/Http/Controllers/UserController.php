<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $folderPath = 'users/' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['img'] = 'storage/' . $imagePath;
        }

        $user = new User([
            'img' => $validatedData['img'] ?? null,
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        $user->save();
        Alert::success('Success', 'User added successfully!');
        return redirect(route('daftarUsers'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validate([
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $folderPath = 'profile-image' . date('Y') . '/' . date('m');
            $imagePath = $image->store($folderPath, 'public');
            $validatedData['img'] = 'profile-image' . $imagePath;
        }

        $user->update([
            'img' => $validatedData['img'] ?? $user->img,
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'password' => $validatedData['password'] ? Hash::make($validatedData['password']) : $user->password,
            'role' => $validatedData['role'],
        ]);

        Alert::success('Success', 'User updated successfully!');
        return redirect(route('daftarUsers'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->img && file_exists(public_path($user->img))) {
            unlink(public_path($user->img));
        }
        $user->delete();
        Alert::success('Success', 'User deleted successfully!');
        return redirect(route('daftarUsers'));
    }
}
