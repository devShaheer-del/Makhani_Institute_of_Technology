<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enroll;

class EnrollController extends Controller
{
    public function CreateEnroll(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'age' => 'required|integer|min:10|max:100',
            'gender' => 'required|string',
            'education' => 'required|string',
            'course' => 'required|string'
        ]);

        Enroll::create($validated); // using mass assignment (cleaner)

        return redirect('/Enroll')->with('success', 'Enrollment Successful!');
    }
}
