<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function data()
    {
        $user = User::all();
        return view('table', compact('user'));
    }

    // edit ka function ha 
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('table', compact('user'));
    }


    // update ka function
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }


    // Delete functionality
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }


    // create user functinality
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }





    // billing ui routes function
    public function uibilling()
    {
        return view('billing');
    }


    // profile ui routes function
    public function uiprofile()
    {
        return view('profile');
    }
}
