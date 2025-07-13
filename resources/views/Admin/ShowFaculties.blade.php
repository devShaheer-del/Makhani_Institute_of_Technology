@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'All Faculties')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold">All Faculties</h1>
            <p class="text-base mt-2">Manage and review Faculties' here.</p>
        </div>

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

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $faculties->links() }}
        </div>
    </div>

    <!-- Faculty Edit Modal -->
    <!-- [ ... Modal code remains unchanged ... ] -->

@endsection
