@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'All Courses')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-indigo-700 mb-6 text-center">All Courses</h2>

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
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Total Classes</th>
                        <th class="px-6 py-3">Duration</th>
                        <th class="px-6 py-3">Fee (PKR)</th>
                        <th class="px-6 py-3">Created At</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $index => $course)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $course->name }}</td>
                            <td class="px-6 py-4">{{ Str::limit($course->description, 50) }}</td>
                            <td class="px-6 py-4">{{ $course->total_classes }}</td>
                            <td class="px-6 py-4">{{ $course->duration }}</td>
                            <td class="px-6 py-4">{{ number_format($course->fee) }}</td>
                            <td class="px-6 py-4">{{ $course->created_at->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-blue-600 hover:underline font-medium mr-3"
                                    onclick="openEditModal({{ $course }})">Edit</button>

                                <a href="{{ 'DeleteCourse/' . $course->id }}"
                                    class="text-red-600 hover:underline font-medium">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center px-6 py-4 text-gray-500">No courses found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-40 z-50 hidden items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl">
            <h2 class="text-xl font-bold mb-4 text-indigo-600">Edit Course</h2>
            <form id="editCourseForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_id">

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="edit_name" class="mt-1 w-full rounded border-gray-300"
                        required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="edit_discription" class="mt-1 w-full rounded border-gray-300" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Total Classes</label>
                    <input type="number" name="total_classes" id="edit_total_classes"
                        class="mt-1 w-full rounded border-gray-300" required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Duration</label>
                    <input type="text" name="duration" id="edit_duration" class="mt-1 w-full rounded border-gray-300"
                        required>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Fee (PKR)</label>
                    <input type="number" name="fee" id="edit_fee" class="mt-1 w-full rounded border-gray-300"
                        required>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        function openEditModal(course) {
            document.getElementById('edit_id').value = course.id;
            document.getElementById('edit_name').value = course.name;
            document.getElementById('edit_discription').value = course.description;
            document.getElementById('edit_total_classes').value = course.total_classes;
            document.getElementById('edit_duration').value = course.duration;
            document.getElementById('edit_fee').value = course.fee;

            const form = document.getElementById('editCourseForm');
            form.action = `UpdateCourse/${course.id}`; // Adjust this route based on your Laravel routes

            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
            
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }
    </script>
@endsection
