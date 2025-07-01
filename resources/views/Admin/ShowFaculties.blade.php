@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'All Faculties')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">All Faculties</h2>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-xl">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-indigo-600 text-white uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Profile</th>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Education</th>
                        <th class="px-6 py-3">Age</th>
                        <th class="px-6 py-3">Tech Specialty</th>
                        <th class="px-6 py-3">Assigned Course</th>
                        <th class="px-6 py-3">Created At</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($faculties as $index => $faculty)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/' . $faculty->profile_picture) }}" alt="Profile"
                                    class="w-12 h-12 rounded-full object-cover border border-indigo-300">
                            </td>
                            <td class="px-6 py-4 font-medium">{{ $faculty->name }}</td>
                            <td class="px-6 py-4">{{ $faculty->education }}</td>
                            <td class="px-6 py-4">{{ $faculty->age }}</td>
                            <td class="px-6 py-4">{{ $faculty->specialty }}</td>
                            <td class="px-6 py-4">{{ $faculty->course_id }}</td>
                            <td class="px-6 py-4">{{ $faculty->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center">


                                <button class="text-blue-600 hover:underline font-medium mr-3"
                                    onclick="OpenModal({{ $faculty }})">Edit</button>

                                <form action="{{ url('/delete-faculty/' . $faculty->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this faculty?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center px-6 py-4 text-gray-500">No faculties found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <!-- Faculty Edit Modal -->
    <div id="editFacultyModal" class="fixed inset-0 bg-black bg-opacity-40 z-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl max-h-[90vh] overflow-y-auto">
            <h2 class="text-xl font-bold mb-4 text-indigo-600">Edit Faculty</h2>
            <form id="editFacultyForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="faculty_id">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="faculty_name" class="mt-1 w-full rounded border-gray-300"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Education</label>
                        <input type="text" name="education" id="faculty_education"
                            class="mt-1 w-full rounded border-gray-300" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" name="age" id="faculty_age" class="mt-1 w-full rounded border-gray-300"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Specialty</label>
                        <input type="text" name="specialty" id="faculty_specialty"
                            class="mt-1 w-full rounded border-gray-300" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Course ID</label>
                        <input type="text" name="course_id" id="faculty_course_id"
                            class="mt-1 w-full rounded border-gray-300" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                        <input type="file" name="profile_picture" id="faculty_profile"
                            class="mt-1 w-full rounded border-gray-300" accept="image/*"
                            onchange="previewFacultyImage(event)">
                        <img id="faculty_preview" src="" alt="Preview"
                            class="mt-2 w-16 h-16 rounded-full object-cover hidden">
                    </div>
                </div>

                <div class="flex justify-end mt-4 space-x-3">
                    <button type="button" onclick="closeFacultyModal()"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        function OpenModal(faculty) {


            document.getElementById('editFacultyModal').classList.remove('hidden');


            document.getElementById('faculty_name').value = faculty.name;
            document.getElementById('faculty_education').value = faculty.education;
            document.getElementById('faculty_age').value = faculty.age;
            document.getElementById('faculty_specialty').value = faculty.specialty;
            document.getElementById('faculty_course_id').value = faculty.course_id;





            const editFacultyForm = document.getElementById('editFacultyForm');


            editFacultyForm.action = `UpdateFaculties/${faculty.id}`;








        }

        function closeFacultyModal() {
            document.getElementById('editFacultyModal').classList.add('hidden');

        }
    </script>


@endsection
