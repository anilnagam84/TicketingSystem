<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //


    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ]);

    // Create a new user
    $user = new User();
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = Hash::make($validatedData['password']);
    $user->save();

    // Optionally, you can add a success message or redirect the user to a specific page
    return redirect()->route('users.index')->with('success', 'User created successfully.');
}
}
