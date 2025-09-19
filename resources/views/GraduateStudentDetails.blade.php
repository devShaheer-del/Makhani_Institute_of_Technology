@extends('Layout.Layout')

@section('title', 'Graduate Details')

@section('content')
    <div class="max-w-6xl mx-auto my-10">
        <h1 class="text-center text-4xl font-bold text-indigo-700 mb-8">Graduation Certificates</h1>

        @foreach($graduates as $graduate)
            <div class="border-4 border-indigo-600 rounded-3xl shadow-2xl bg-white p-10 mb-12 relative overflow-hidden">

                <!-- Decorative Background -->
                <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/white-wall.png')]"></div>

                <!-- Header with Logo -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Institute Logo" class="w-20 h-20 mb-3">
                    <h2 class="text-3xl font-extrabold text-gray-800">Makhani Institute of Technology</h2>
                    <p class="text-lg text-gray-600 italic">Empowering Future Through Technology & Innovation</p>
                </div>

                <!-- Title -->
                <div class="relative z-10 mt-6 text-center">
                    <h3 class="text-2xl font-semibold text-indigo-700 underline">Certificate of Graduation</h3>
                    <p class="mt-2 text-gray-700">This certificate is proudly presented to</p>
                </div>

                <!-- Student Details -->
                <div class="relative z-10 mt-6 text-center">
                    <h2 class="text-3xl font-bold text-gray-900">{{ $graduate->name }}</h2>
                    <p class="text-gray-600">S/O {{ $graduate->father_name }}</p>
                    <p class="mt-2 text-sm text-gray-500">Student Unique ID: <span class="font-semibold">{{ $graduate->StudentID }}</span></p>
                </div>

                <!-- Course Info -->
                <div class="relative z-10 mt-8 text-center">
                    <p class="text-lg text-gray-700">has successfully completed the course</p>
                    <h3 class="text-2xl font-semibold text-indigo-600 mt-2">{{ $graduate->course }}</h3>
                    <p class="mt-2 text-gray-700">with Grade <span class="font-bold">{{ $graduate->grade }}</span></p>
                    <p class="mt-1 text-sm text-gray-500">Graduation Date: {{ \Carbon\Carbon::parse($graduate->graduation_date)->format('d M, Y') }}</p>
                </div>

                <!-- Footer with Signature -->
                <div class="relative z-10 mt-12 flex justify-between items-center">
                    <div class="text-left">
                        <img src="{{ asset('images/signature.png') }}" alt="Authorized Signature" class="w-32 h-auto">
                        <p class="text-sm text-gray-500">Authorized by Head of Department</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-gray-500 italic">Makhani Institute of Technology</p>
                        <p class="text-xs text-gray-400">"Shaping Skills, Building Future"</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
