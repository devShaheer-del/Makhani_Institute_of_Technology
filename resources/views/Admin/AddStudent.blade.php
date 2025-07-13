@extends('Admin.Admin_Layout.AdminLayout')
@section('title', 'Add Student')

@section('content')

    @if (session('success'))
        <div id="success-alert"
            class="bg-green-500 text-white font-semibold p-4 rounded-xl mb-4 text-center shadow-lg transition-opacity duration-500 ease-in-out opacity-100">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-2xl rounded-2xl mt-6">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">Create Students</h1>
        <p class="text-base mt-2">Manage and review students' here.</p>
    </div>
        <form action="CreateStudent" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Form No</label>
                    <input type="text" name="form_no" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Registration No</label>
                    <input type="text" name="reg_no" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Date</label>
                    <input type="date" name="date" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">First Name</label>
                    <input type="text" name="first_name" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Last Name</label>
                    <input type="text" name="last_name" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Father's or Husband's Name</label>
                    <input type="text" name="guardian_name" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Date of Birth</label>
                    <input type="date" name="dob" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Age</label>
                    <input type="number" name="age" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">CNIC No</label>
                    <input type="text" name="cnic" placeholder="XXXXX-XXXXXXX-X" class="w-full border p-2 rounded"
                        required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Gender</label>
                    <div class="space-x-4">
                        <label><input type="radio" name="gender" value="Male" required> Male</label>
                        <label><input type="radio" name="gender" value="Female"> Female</label>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Marital Status</label>
                    <div class="space-x-4">
                        <label><input type="radio" name="marital_status" value="Single" required> Single</label>
                        <label><input type="radio" name="marital_status" value="Married"> Married</label>
                    </div>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Mobile Number</label>
                    <input type="number" name="mobile" class="w-full border p-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold mb-1">Home Contact No</label>
                    <input type="number" name="home_contact" class="w-full border p-2 rounded">
                </div>
                <div>
                    <label class="block font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="w-full border p-2 rounded">
                </div>
                <div class="md:col-span-2">
                    <label class="block font-semibold mb-1">Address</label>
                    <textarea name="address" class="w-full border p-2 rounded" rows="3"></textarea>
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1 mb-2">Select Courses</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="courses[]" value="CIT" class="rounded text-indigo-600">
                        <span>CIT</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="courses[]" value="Graphic Designing" class="rounded text-indigo-600">
                        <span>Graphic Designing</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="courses[]" value="3D Animation" class="rounded text-indigo-600">
                        <span>3D Animation</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="courses[]" value="Digital Marketing" class="rounded text-indigo-600">
                        <span>Digital Marketing</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="courses[]" value="Web Development" class="rounded text-indigo-600">
                        <span>Web Development</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="courses[]" value="Mobile App Development"
                            class="rounded text-indigo-600">
                        <span>Mobile App Development</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="courses[]" value="AC Repairing" class="rounded text-indigo-600">
                        <span>AC Repairing</span>
                    </label>
                </div>
            </div>



            <div>
                <label class="block font-semibold mb-1">Attach Documents</label>
                <select name="documents" class="w-full border p-2 rounded">
                    <option value="">Student Attact Document</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>

                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Terms and Conditions</label>
                <select name="terms" class="w-full border p-2 rounded">
                    <option value="">Select Terms</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Not Accepted">Not Accepted</option>
                </select>
            </div>

            <div class="flex items-center space-x-2">
                <input type="checkbox" name="signature">
                <label>Student Signature</label>
                <span class="ml-4 text-sm text-gray-600">Date: {{ date('Y-m-d') }}</span>
            </div>

            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4 text-indigo-600">Select Course Timings</h2>
                <div class="space-y-4">
                    <div class="p-4 border rounded shadow">
                        <h3 class="font-semibold mb-2">CIT (Thursday & Saturday)</h3>
                        <select name="cit_timing" class="w-full border p-2 rounded">
                            <option value="1:30-2:30">1:30 - 2:30 pm</option>
                            <option value="2:30-3:30">2:30 - 3:30 pm</option>
                            <option value="3:30-4:30">3:30 - 4:30 pm</option>
                        </select>
                    </div>
                    <div class="p-4 border rounded shadow">
                        <h3 class="font-semibold mb-2">Graphic Designing (Mon, Tue, Wed)</h3>
                        <select name="graphic_timing" class="w-full border p-2 rounded">
                            <option value="1:30-2:30">1:30 - 2:30 pm</option>
                            <option value="2:30-3:30">2:30 - 3:30 pm</option>
                            <option value="3:30-4:30">3:30 - 4:30 pm</option>
                        </select>
                    </div>
                    <div class="p-4 border rounded shadow">
                        <h3 class="font-semibold mb-2">Digital Marketing (Tue, Thurs, Sat)</h3>
                        <select name="dm_timing" class="w-full border p-2 rounded">
                            <option value="2:30-3:00">2:00 - 3:00 pm</option>
                            <option value="3:00-4:00">3:00 - 4:00 pm</option>
                        </select>
                    </div>
                    <div class="p-4 border rounded shadow">
                        <h3 class="font-semibold mb-2">3D Animation (Mon, Wed, Sat)</h3>
                        <select name="animation_timing" class="w-full border p-2 rounded">
                            <option value="10:30-12:30">10:30 am - 12:30 pm</option>
                            <option value="2:00-4:00">2:00 - 4:00 pm</option>
                        </select>
                    </div>
                    <div class="p-4 border rounded shadow">
                        <h3 class="font-semibold mb-2">Web Development (Mon, Tue, Wed)</h3>
                        <select name="web_timing" class="w-full border p-2 rounded">
                            <option value="10:30-12:30">10:30 am - 12:30 pm</option>
                            <option value="2:00-4:00">2:00 - 4:00 pm</option>
                        </select>
                    </div>
                    <div class="p-4 border rounded shadow">
                        <h3 class="font-semibold mb-2">Mobile App Development (Thurs, Fri, Sat)</h3>
                        <select name="mobile_timing" class="w-full border p-2 rounded">
                            <option value="2:30-3:30">2:30 - 3:30 pm</option>
                            <option value="4:00-5:00">4:00 - 5:00 pm</option>
                        </select>
                    </div>
                    <div class="p-4 border rounded shadow">
                        <h3 class="font-semibold mb-2">AC Repairing</h3>
                        <select name="ac_timing" class="w-full border p-2 rounded">
                            <option value="2:30-3:30">2:30 - 3:30 pm</option>
                            <option value="4:00-5:00">4:00 - 5:00 pm</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full py-3 bg-indigo-600 text-white font-bold rounded hover:bg-indigo-700 transition">
                Submit
            </button>
        </form>
    </div>
@endsection
