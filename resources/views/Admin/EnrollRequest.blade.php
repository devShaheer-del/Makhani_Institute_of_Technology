@extends('Admin.Admin_Layout.AdminLayout')
@section('title', 'Enroll Requests')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold">Enrollment Requests</h1>
            <p class="text-base mt-2">Manage and review students' enrollment requests here.</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">
            <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Student Name</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Phone</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Email</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Age</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Gender</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Last Education</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Selected Course</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Date of Request</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Actions</th>



                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    {{-- Example row, you can loop over your enrollments here --}}
                    @foreach ($Enrolls as $index => $StudentEnrolls)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->id }}</td>
                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $StudentEnrolls->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->number }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->email }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->age }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->gender }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->education }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->course }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600">{{ $StudentEnrolls->created_at }}</td>



                            <td class="px-4 py-2">
                                <div class="flex space-x-2 justify-center">
                                    {{-- Approve button --}}
                                    <form action="{{ url('ApproveEmail/' . $StudentEnrolls->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded shadow text-xs">
                                            Approve
                                        </button>
                                    </form>

                                    {{-- Reject button --}}
                                    <form action="{{ url('RejectEmail/' . $StudentEnrolls->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded shadow text-xs">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    {{-- end loop --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
