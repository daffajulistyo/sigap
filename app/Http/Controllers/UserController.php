<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // Display a listing of the users.
    public function index()
    {
        $users = User::all();
        return view('admin.data.users', compact('users'));
    }

    // Store a newly created user in storage.
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'username' => 'required|string|max:255|unique:users',
                'role' => 'required|string|max:255',
                'puskesmas_id' => 'required|exists:puskesmas,id',
            ],
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'role' => $request->role,
            'puskesmas_id' => $request->puskesmas_id
        ]);

        return redirect()->route('users.index')->with('success', 'Data Berhasil Ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'puskesmas_id' => 'required|exists:puskesmas,id',

        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->puskesmas_id = $request->puskesmas_id;


        $user->save();

        return redirect()->route('users.index')->with('success', 'Data Berhasil Di Perbarui.');
    }

    // Remove the specified user from storage.
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data Berhasil Dihapus.');
    }

    // Reset the password.
    public function resetPassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:8',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Password Berhasil Di Reset.');
    }
}
