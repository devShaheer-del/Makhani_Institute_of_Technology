@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'Add Graduates')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-2xl rounded-2xl">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold">Create Graduates</h1>
            <p class="text-base mt-2">Create Graduates' here.</p>
        </div>
        <form action="CreateGraduate" method="POST" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Father's Name -->
            <div>
                <label for="father_name" class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" name="father_name" id="father_name" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Course -->
            <div>
                <label for="course" class="block text-sm font-medium text-gray-700">Course of Graduation</label>
                <select name="course" id="course" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Select Course</option>
                    <option value="CIT">CIT</option>
                    <option value="Graphics">Graphics</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile App Development">Mobile Development</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Ac Repairing">Ac Repairing</option>
                </select>
            </div>

            <!-- Graduation Date -->
            <div>
                <label for="graduation_date" class="block text-sm font-medium text-gray-700">Graduation Date</label>
                <input type="date" name="graduation_date" id="graduation_date" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Grade -->
            <div>
                <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                <select name="grade" id="grade" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled selected>Select Grade</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                    class="bg-gradient-to-r from-indigo-500 to-cyan-500 text-white font-semibold px-6 py-2 rounded-xl shadow-lg hover:scale-105 transition duration-300 ease-in-out">
                    Add Graduate
                </button>
            </div>
        </form>
    </div>
@endsection
