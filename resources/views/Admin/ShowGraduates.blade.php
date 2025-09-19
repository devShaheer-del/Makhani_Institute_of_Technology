@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'Show and Manage Graduates')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold">Makhani Grduates Details</h1>
            <p class="text-base mt-2">Manage and review MIT Graduates' here.</p>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (count($graduates) > 0)
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-indigo-600 to-cyan-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Student ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Father's Name
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Graduation Date
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Grade</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        @foreach ($graduates as $index => $graduate)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $graduate->StudentID }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $graduate->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $graduate->father_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $graduate->course }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($graduate->graduation_date)->format('M d, Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $graduate->grade }}</td>
                                <td class="px-6 py-4 whitespace-nowrap space-x-2">

                                    <a href="{{ url('DeleteGraduates/' . $graduate->id) }}"
                                        class="text-red-600 hover:text-red-800 font-medium">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-6 rounded shadow text-gray-600">
                No graduate records found.
            </div>
        @endif
    </div>

@endsection
