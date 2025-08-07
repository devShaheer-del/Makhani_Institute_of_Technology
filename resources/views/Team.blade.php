@extends('Layout.Layout')

@section('title', 'Our Faculty | Expert Instructors - Makhani Institute of Technology')
@section('meta_keywords', 'Makhani Institute faculty, IT institute teachers, expert instructors Pakistan, web development teachers, graphic design mentors, CIT teachers, tech faculty in Pakistan')
@section('meta_description', 'Meet the expert faculty members of Makhani Institute of Technology. Learn from certified instructors with real-world experience in Web Development, CIT, Graphic Designing, and more.')

@section('content')

<!-- AOS CDN -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        AOS.init({
            duration: 1000,
            once: false,
            mirror: true
        });
    });
</script>

<section class="bg-gradient-to-br from-blue-800 via-indigo-900 to-blue-900 py-16 min-h-screen">
    <div class="container mx-auto px-4">
        <h2 class="text-5xl font-extrabold text-white text-center mb-16 drop-shadow-lg" data-aos="fade-down">
            Meet Our Expert Faculty
        </h2>

        {{-- Check if there is team data --}}
        @if ($team->count())
            <div class="grid gap-10 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($team as $index => $member)
                    <div class="group relative bg-white/10 backdrop-blur-xl rounded-3xl overflow-hidden shadow-2xl transition transform hover:-translate-y-2 hover:shadow-cyan-500/50"
                        data-aos="zoom-in-up" data-aos-delay="{{ $index * 100 }}">

                        <!-- Image -->
                        <div class="h-56 overflow-hidden">
                            @if ($member->profile_picture && file_exists(public_path('storage/' . $member->profile_picture)))
                                <img src="{{ asset('storage/' . $member->profile_picture) }}" alt="{{ $member->name }} - Makhani Institute Faculty"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" alt="Faculty profile not available"
                                    class="w-full h-full object-cover opacity-60">
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="p-6 text-white">
                            <h3 class="text-2xl font-bold mb-2 drop-shadow-sm">{{ $member->name }}</h3>
                            <p class="text-cyan-300 text-sm mb-2 flex items-center gap-2">
                                🎓 {{ $member->education }}
                            </p>
                            <div class="text-sm space-y-1">
                                <p class="text-white/90">🧑‍🎓 Age: <span class="font-semibold">{{ $member->age }}</span></p>
                                <p class="text-white/90">✨ Specialty: <span class="font-semibold">{{ $member->specialty }}</span></p>
                                <p class="text-white/90">📘 Teaches: <span class="font-semibold">{{ $member->course_id }}</span></p>
                            </div>
                        </div>

                        <!-- Border Glow -->
                        <div class="absolute inset-0 border border-white/10 rounded-3xl group-hover:border-cyan-400 transition duration-500 pointer-events-none"></div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-14 flex justify-center text-white" data-aos="fade-up">
                {{ $team->links() }}
            </div>
        @else
            <p class="text-center text-white text-lg mt-10" data-aos="fade-up">
                No team or faculty members found at this time.
            </p>
        @endif
    </div>
</section>

@endsection
