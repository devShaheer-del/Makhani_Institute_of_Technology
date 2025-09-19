<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\users;
use App\Models\Graduates;
use App\Mail\UserVerificationMail;

class UsersController extends Controller
{
    public function CreateUser(Request $request)
{
    $validated = $request->validate([
        'name'     => 'required|string',
        'email'    => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'StudentPicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $hashedPassword = Hash::make($validated['password']);

    $profilePath = null;

    // ✅ Image upload check
    if ($request->hasFile('StudentPicture')) {
        $profilePath = $request->file('StudentPicture')->store('Student_Profile_Images', 'public');
    }

    // ✅ Generate unique 6-digit Personal_ID
    do {
        $personalId = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    } while (Users::where('Personal_ID', $personalId)->exists());

    // ✅ Save user
    $user = new Users;
    $user->Personal_ID    = $personalId;
    $user->name           = $validated['name'];
    $user->email          = $validated['email'];
    $user->password       = $hashedPassword;
    $user->StudentPicture = $profilePath;
    $user->save();

    // ✅ Send verification email
    Mail::to($user->email)->send(new UserVerificationMail($user));

    return redirect('/Signup')->with('success', 'Account created successfully! A verification email has been sent.');
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




 public function findGraduates(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'personal_id' => 'required|string',
    ]);

    // Personal ID trim karke search karo
    $personalId = trim($validated['personal_id']);

    // Graduates ko StudentID se search karo
    $graduates = Graduates::where('StudentID', $personalId)->get();

    // Debugging ke liye (sirf test ke liye uncomment karo)
    // dd($graduates);

    // Agar data mila
    if ($graduates->count() > 0) {
        return view('GraduateStudentDetails', [
            'graduates'   => $graduates,
            'personal_id' => $personalId
        ]);
    } else {
        // Agar StudentID galat hai
        return redirect()->back()
            ->withErrors(['personal_id' => 'No graduate record found for this Student ID.'])
            ->withInput();
    }
}




    public function showCourseGraduates($course)
{
    // Graduates ko course ke hisaab se filter karo
    $graduates = Graduates::where('course', $course)->get();

    return view('AccordingCourse', compact('graduates', 'course'));
}



    public function fetchStudentprofile(){
        return view('StudentProfile');
    }




    public function StudentUpdateProfile(Request $request)
    {
        // Get logged-in student from session
        $user = session('user');
        $student = users::find($user['id']); 

        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        // Validate input
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'password' => 'nullable|min:6',
            'StudentPicture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update fields
        $student->name = $request->name;
        $student->email = $request->email;

        if ($request->password) {
            $student->password = Hash::make($request->password);
        }

        // Handle profile image
        if ($request->hasFile('StudentPicture')) {
            // delete old image if exists
            if ($student->StudentPicture) {
                Storage::delete('public/' . $student->StudentPicture);
            }

            $path = $request->file('StudentPicture')->store('students', 'public');
            $student->StudentPicture = $path;
        }

        $student->save();

        // update session
        session(['user' => $student->toArray()]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }




    


}
