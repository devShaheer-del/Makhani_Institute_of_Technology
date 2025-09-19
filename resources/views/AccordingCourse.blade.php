@extends('Layout.Layout')

@section('title', $course . ' Graduates')

@section('content')
<div class="max-w-6xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl sm:text-3xl font-bold text-indigo-700 mb-6 text-center">
        {{ $course }} - Graduates List
    </h1>

    @if($graduates->count() > 0)
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="min-w-full text-sm sm:text-base">
                <thead class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white">
                    <tr>
                        <th class="py-3 px-4 sm:px-6 text-left font-semibold">Student ID</th>
                        <th class="py-3 px-4 sm:px-6 text-left font-semibold">Name</th>
                        <th class="py-3 px-4 sm:px-6 text-left font-semibold">Father's Name</th>
                        <th class="py-3 px-4 sm:px-6 text-left font-semibold">Course</th>
                        <th class="py-3 px-4 sm:px-6 text-left font-semibold">Grade</th>
                        <th class="py-3 px-4 sm:px-6 text-left font-semibold">Graduation Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($graduates as $graduate)
                        <tr class="hover:bg-indigo-50 transition">
                            <td class="py-3 px-4 sm:px-6">{{ $graduate->StudentID }}</td>
                            <td class="py-3 px-4 sm:px-6 font-medium text-gray-800">{{ $graduate->name }}</td>
                            <td class="py-3 px-4 sm:px-6">{{ $graduate->father_name }}</td>
                            <td class="py-3 px-4 sm:px-6 text-indigo-600 font-semibold">{{ $graduate->course }}</td>
                            <td class="py-3 px-4 sm:px-6">
                                <span class="inline-block px-2 py-1 text-xs sm:text-sm rounded-full 
                                    {{ $graduate->grade == 'A' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ $graduate->grade }}
                                </span>
                            </td>
                            <td class="py-3 px-4 sm:px-6">{{ \Carbon\Carbon::parse($graduate->graduation_date)->format('d M, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-gray-600">No graduates found for this course.</p>
    @endif
</div>
@endsection
