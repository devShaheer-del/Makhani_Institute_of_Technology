@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'Add Graduates')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-2xl rounded-2xl">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold">Create Graduates</h1>
            <p class="text-base mt-2">Create Graduates' here.</p>
        </div>

        {{-- Show global validation errors --}}
        @if ($errors->any())
            <div class="mb-4 p-4 rounded-xl bg-red-100 border border-red-400 text-red-700">
                <ul class="list-disc pl-6">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('CreateGraduate') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Student ID -->
            <div>
                <label for="student_id" class="block text-sm font-medium text-gray-700">Student Unique ID</label>
                <input type="number" name="student_id" id="student_id"
                    value="{{ old('student_id') }}" required
                    class="mt-1 block w-full px-4 py-2 border @error('student_id') border-red-500 @else border-gray-300 @enderror rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('student_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name') }}" required
                    class="mt-1 block w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Father's Name -->
            <div>
                <label for="father_name" class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" name="father_name" id="father_name"
                    value="{{ old('father_name') }}" required
                    class="mt-1 block w-full px-4 py-2 border @error('father_name') border-red-500 @else border-gray-300 @enderror rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('father_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course -->
            <div>
                <label for="course" class="block text-sm font-medium text-gray-700">Course of Graduation</label>
                <select name="course" id="course" required
                    class="mt-1 block w-full px-4 py-2 border @error('course') border-red-500 @else border-gray-300 @enderror rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled {{ old('course') ? '' : 'selected' }}>Select Course</option>
                    <option value="CIT" {{ old('course') == 'CIT' ? 'selected' : '' }}>CIT</option>
                    <option value="Graphics" {{ old('course') == 'Graphics' ? 'selected' : '' }}>Graphics</option>
                    <option value="Web Development" {{ old('course') == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                    <option value="Mobile App Development" {{ old('course') == 'Mobile App Development' ? 'selected' : '' }}>Mobile Development</option>
                    <option value="Digital Marketing" {{ old('course') == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                    <option value="Ac Repairing" {{ old('course') == 'Ac Repairing' ? 'selected' : '' }}>Ac Repairing</option>
                </select>
                @error('course')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Graduation Date -->
            <div>
                <label for="graduation_date" class="block text-sm font-medium text-gray-700">Graduation Date</label>
                <input type="date" name="graduation_date" id="graduation_date"
                    value="{{ old('graduation_date') }}" required
                    class="mt-1 block w-full px-4 py-2 border @error('graduation_date') border-red-500 @else border-gray-300 @enderror rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('graduation_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Grade -->
            <div>
                <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                <select name="grade" id="grade" required
                    class="mt-1 block w-full px-4 py-2 border @error('grade') border-red-500 @else border-gray-300 @enderror rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="" disabled {{ old('grade') ? '' : 'selected' }}>Select Grade</option>
                    <option value="A+" {{ old('grade') == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A" {{ old('grade') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B+" {{ old('grade') == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B" {{ old('grade') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('grade') == 'C' ? 'selected' : '' }}>C</option>
                </select>
                @error('grade')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
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
