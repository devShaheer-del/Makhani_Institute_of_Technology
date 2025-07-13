@extends('Layout.Layout')

@section('title', 'Team & Faculties')

@section('content')

<section class="bg-gradient-to-br from-blue-800 via-indigo-900 to-blue-900 py-16 min-h-screen">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-white text-center mb-12">Meet Our Faculty</h2>

        <!-- Faculty Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            @foreach ($team as $member)
                <div class="bg-white/10 backdrop-blur-lg text-white rounded-3xl overflow-hidden shadow-xl transform transition hover:scale-105 hover:shadow-2xl">
                    <div class="h-56 w-full overflow-hidden cursor-pointer">
                        <img src="{{ asset('storage/' . $member->profile_picture) }}" class="object-cover w-full h-full">
                    </div>
                    <div class="p-5">
                        <h3 class="text-xl font-bold mb-1">{{ $member['name'] }}</h3>
                        <p class="text-sm text-cyan-300 mb-2">{{ $member['education'] }}</p>
                        <p class="text-sm text-white/80">Age : {{ $member['age'] }}</p>
                        <p class="text-sm text-white/80">Specialty : {{ $member['specialty'] }}</p>
                        <p class="text-sm text-white/80">Teacher of : {{ $member['course_id'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center text-white">
            {{ $team->links() }}
        </div>
    </div>
</section>

@endsection
