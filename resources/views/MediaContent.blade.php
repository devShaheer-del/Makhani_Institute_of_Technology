@extends('Layout.Layout')

@section('title', 'Media Content | Makhani Institute of Technology')
@section('meta_keywords', 'IT institute in Pakistan, Web Development, Graphic Designing, Mobile App Development, CIT, Digital Marketing, Makhani Institute')
@section('meta_description', 'Join Makhani Institute of Technology – Pakistan’s leading private tech institute offering expert-led courses in Web Development, CIT, Graphic Design, and more.')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-blue-800 mb-8">Media</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($MyContent as $Content)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
                    <!-- Image Section -->
                    <div class="w-full h-auto">
                        <img src="{{ asset('storage/' . $Content->path) }}"
                             alt="Gallery Image"
                             class="w-full h-auto object-contain">
                    </div>

                    <!-- Text Section -->
                    <div class="p-5 space-y-2">
                        <h2 class="text-lg font-bold text-blue-700">{{ $Content->title }}</h2>
                        <p class="text-sm text-gray-600">{{ $Content->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center text-white">
            {{ $MyContent->links() }}
        </div>
    </div>
@endsection
