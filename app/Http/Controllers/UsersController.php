<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function CreateUser(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Hash password
        $hashedPassword = Hash::make($validated['password']);

        // Create user and save to database
        $user = new users;
        $user->name     = $validated['name'];
        $user->email    = $validated['email'];
        $user->password = $hashedPassword;
        $user->save(); // ✅ Important: save to DB

        // Optional response (you can customize this)
      return redirect('/Signup')->with('success', 'Account created successfully!');

    }


    public function LoginUser(Request $requestforlogin)
{
    // ✅ Fix validation (remove `unique`)
    $validated = $requestforlogin->validate([
        'email'    => 'required|email',
        'password' => 'required|string|min:6',
    ]);

    // ✅ Find user by email
    $find_user = users::where('email', $validated['email'])->first();

    // ❌ User not found
    if (!$find_user) {
        return redirect('/Login')->with('error', 'User not found');
    }

    // ✅ Check hashed password
    if (!Hash::check($validated['password'], $find_user->password)) {
        return redirect('/Login')->with('error', 'Invalid credentials');
    }

    // ✅ Store user in session
    session(['user' => $find_user]);

    return redirect('/')->with('success', 'Login Successfully');
}


    function Logout(){
        session()->forget('user');
    return redirect('/')->with('success', 'Logged out successfully');
    }

}
