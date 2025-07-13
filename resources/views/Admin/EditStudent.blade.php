@extends('Admin.Admin_Layout.AdminLayout')
@section('title', 'Edit Student')

@section('content')

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-2xl rounded-2xl mt-6">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">Edit Student Details</h1>
        <p class="text-base mt-2">Update and review students' Detail here.</p>
    </div>
        <form action="{{ url('UpdateStudent/' . $selectStudent->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            @php
                $decodedCourses = collect(json_decode($selectStudent->courses ?? '[]'));
                $courses = $decodedCourses->pluck('course')->toArray();
                $timings = $decodedCourses->mapWithKeys(function ($item) {
                    return [$item->course => $item->timing];
                });
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Form No</label>
                    <input type="text" name="form_no" value="{{ $selectStudent->form_no }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Registration No</label>
                    <input type="text" name="reg_no" value="{{ $selectStudent->reg_no }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Date</label>
                    <input type="date" name="date" value="{{ $selectStudent->date }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">First Name</label>
                    <input type="text" name="first_name" value="{{ $selectStudent->first_name }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ $selectStudent->last_name }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Father's or Husband's Name</label>
                    <input type="text" name="guardian_name" value="{{ $selectStudent->guardian_name }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Date of Birth</label>
                    <input type="date" name="dob" value="{{ $selectStudent->dob }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Age</label>
                    <input type="number" name="age" value="{{ $selectStudent->age }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">CNIC No</label>
                    <input type="text" name="cnic" value="{{ $selectStudent->cnic }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Gender</label>
                    <div class="space-x-4">
                        <label><input type="radio" name="gender" value="Male" {{ $selectStudent->gender == 'Male' ? 'checked' : '' }} required> Male</label>
                        <label><input type="radio" name="gender" value="Female" {{ $selectStudent->gender == 'Female' ? 'checked' : '' }}> Female</label>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Marital Status</label>
                    <div class="space-x-4">
                        <label><input type="radio" name="marital_status" value="Single" {{ $selectStudent->marital_status == 'Single' ? 'checked' : '' }} required> Single</label>
                        <label><input type="radio" name="marital_status" value="Married" {{ $selectStudent->marital_status == 'Married' ? 'checked' : '' }}> Married</label>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Mobile Number</label>
                    <input type="text" name="mobile" value="{{ $selectStudent->mobile }}" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Home Contact No</label>
                    <input type="text" name="home_contact" value="{{ $selectStudent->home_contact }}" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" value="{{ $selectStudent->email }}" class="w-full border p-2 rounded">
                </div>
                <div class="md:col-span-2">
                    <label class="block font-semibold mb-1">Address</label>
                    <textarea name="address" class="w-full border p-2 rounded" rows="3">{{ $selectStudent->address }}</textarea>
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1">Select Courses</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach (['CIT', 'Graphic Designing', '3D Animation', 'Digital Marketing', 'Web Development', 'Mobile App Development', 'AC Repairing'] as $course)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="courses[]" value="{{ $course }}" {{ in_array($course, $courses) ? 'checked' : '' }} class="rounded text-indigo-600">
                            <span>{{ $course }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1">Attach Documents</label>
                <select name="documents" class="w-full border p-2 rounded">
                    <option value="">Student Attach Document</option>
                    <option value="Yes" {{ $selectStudent->documents == 'Yes' ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ $selectStudent->documents == 'No' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Terms and Conditions</label>
                <select name="terms" class="w-full border p-2 rounded">
                    <option value="">Select Terms</option>
                    <option value="Accepted" {{ $selectStudent->terms == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="Not Accepted" {{ $selectStudent->terms == 'Not Accepted' ? 'selected' : '' }}>Not Accepted</option>
                </select>
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" name="signature" {{ $selectStudent->signature ? 'checked' : '' }}>
                <label>Student Signature</label>
                <span class="ml-4 text-sm text-gray-600">Date: {{ date('Y-m-d') }}</span>
            </div>

            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4 text-indigo-600">Select Course Timings</h2>
                <div class="space-y-4">
                    @foreach ([
                        ['CIT', 'cit_timing', ['1:30-2:30', '2:30-3:30', '3:30-4:30']],
                        ['Graphic Designing', 'graphic_timing', ['1:30-2:30', '2:30-3:30', '3:30-4:30']],
                        ['Digital Marketing', 'dm_timing', ['2:30-3:00', '3:00-4:00']],
                        ['3D Animation', 'animation_timing', ['10:30-12:30', '2:00-4:00']],
                        ['Web Development', 'web_timing', ['10:30-12:30', '2:00-4:00']],
                        ['Mobile App Development', 'mobile_timing', ['2:30-3:30', '4:00-5:00']],
                        ['AC Repairing', 'ac_timing', ['2:30-3:30', '4:00-5:00']]
                    ] as [$label, $name, $options])
                        <div class="p-4 border rounded shadow">
                            <h3 class="font-semibold mb-2">{{ $label }}</h3>
                            <select name="{{ $name }}" class="w-full border p-2 rounded">
                                @foreach ($options as $opt)
                                    <option value="{{ $opt }}" {{ ($timings[$label] ?? '') == $opt ? 'selected' : '' }}>
                                        {{ $opt }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="w-full py-3 bg-indigo-600 text-white font-bold rounded hover:bg-indigo-700 transition">
                Submit
            </button>
        </form>
    </div>
@endsection
