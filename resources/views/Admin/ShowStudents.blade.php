@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'All Students')

@section('content')
    <div class="container mx-auto mt-8 p-6 bg-white rounded shadow">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
            <h1 class="text-3xl font-bold">All Enrolled Students</h1>
            <p class="text-base mt-2">Manage and review All students' here.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="SearchStudent" method="get">
            <div class="mb-4 flex items-center space-x-2">
                <input type="text" name="search" placeholder="Search students..."
                    class="border border-gray-300 rounded p-2 w-1/3" />
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Search
                </button>
            </div>
        </form>

        @if ($MyStudent->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 text-sm text-left">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="p-2">#</th>
                            <th class="p-2">Form No</th>
                            <th class="p-2">Reg No</th>
                            <th class="p-2">Date</th>
                            <th class="p-2">Name</th>
                            <th class="p-2">Guardian</th>
                            <th class="p-2">DOB</th>
                            <th class="p-2">Age</th>
                            <th class="p-2">CNIC</th>
                            <th class="p-2">Gender</th>
                            <th class="p-2">Marital</th>
                            <th class="p-2">Mobile</th>
                            <th class="p-2">Home Contact</th>
                            <th class="p-2">Email</th>
                            <th class="p-2">Address</th>
                            <th class="p-2">Courses</th>
                            <th class="p-2">Documents</th>
                            <th class="p-2">Terms</th>
                            <th class="p-2">Signature</th>
                            <th class="p-2">Created At</th>
                            <th class="p-2">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($MyStudent as $index => $student)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-2">{{ $index + 1 }}</td>
                                <td class="p-2">{{ $student->form_no }}</td>
                                <td class="p-2">{{ $student->reg_no }}</td>
                                <td class="p-2">{{ $student->date }}</td>
                                <td class="p-2">{{ $student->first_name }} {{ $student->last_name }}</td>
                                <td class="p-2">{{ $student->guardian_name }}</td>
                                <td class="p-2">{{ $student->dob }}</td>
                                <td class="p-2">{{ $student->age }}</td>
                                <td class="p-2">{{ $student->cnic }}</td>
                                <td class="p-2">{{ $student->gender }}</td>
                                <td class="p-2">{{ $student->marital_status }}</td>
                                <td class="p-2">{{ $student->mobile }}</td>
                                <td class="p-2">{{ $student->home_contact ?? '-' }}</td>
                                <td class="p-2">{{ $student->email ?? '-' }}</td>
                                <td class="p-2">{{ $student->address ?? '-' }}</td>
                                <td class="p-2">
                                    @php
                                        $courses = json_decode($student->courses, true);
                                    @endphp
                                    @if (is_array($courses) && count($courses) > 0)
                                        <ul class="list-disc pl-4">
                                            @foreach ($courses as $c)
                                                <li>
                                                    {{ $c['course'] ?? '-' }}
                                                    @if (!empty($c['timing']))
                                                        ({{ $c['timing'] }})
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="p-2">{{ $student->documents }}</td>
                                <td class="p-2">{{ $student->terms }}</td>
                                <td class="p-2">{{ $student->signature ? 'Signed' : 'Not Signed' }}</td>
                                <td class="p-2">{{ $student->created_at->format('Y-m-d') }}</td>
                                <td class="p-2">
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <a href="{{ url('SelectEdit/' . $student->id) }}"
                                            class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-xs text-center">
                                            Edit
                                        </a>

                                        <a href="{{ url('DeleteStudent/' . $student->id) }}"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs w-full sm:w-auto">Delete</a>
                                    </div>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        @else
            <div class="bg-yellow-100 text-yellow-700 p-3 rounded">
                No students found.
            </div>

        @endif
    </div>

    <div class="mt-10 flex justify-center text-white">
                        {{ $MyStudent->links() }}
                    </div>

@endsection
