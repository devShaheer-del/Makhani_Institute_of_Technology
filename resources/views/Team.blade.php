@extends('Layout.Layout')

@section('title', 'Team & Faculties')

@section('content')

    <section class="bg-gradient-to-br from-blue-800 via-indigo-900 to-blue-900 py-16 min-h-screen">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-white text-center mb-12">Meet Our Faculty</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                {{-- @php
                $team = [
                    ['name' => 'Dr. Aisha Rehman', 'title' => 'Head of Computer Science', 'image' => 'teacher1.jpg', 'desc' => 'Ph.D. in AI with 15+ years of experience.'],
                    ['name' => 'Mr. Kamran Malik', 'title' => 'Senior Graphics Instructor', 'image' => 'teacher2.jpg', 'desc' => 'Expert in Adobe Suite and UI/UX.'],
                    ['name' => 'Ms. Zara Khan', 'title' => 'Web Development Trainer', 'image' => 'teacher3.jpg', 'desc' => 'Full-stack developer and coding mentor.'],
                    ['name' => 'Mrs. Sana Ahmed', 'title' => 'Coordinator & Student Advisor', 'image' => 'staff1.jpg', 'desc' => 'Guiding students toward success.'],
                    ['name' => 'Mr. Imran Ali', 'title' => 'System Administrator', 'image' => 'staff2.jpg', 'desc' => 'Ensures our labs run smoothly.'],
                    ['name' => 'Miss Hira Sheikh', 'title' => 'Assistant Lecturer', 'image' => 'teacher4.jpg', 'desc' => 'Teaches CIT and supports research.'],
                    ['name' => 'Mr. Bilal Shah', 'title' => 'Lab Assistant', 'image' => 'staff3.jpg', 'desc' => 'Helps during practical sessions.'],
                    ['name' => 'Ms. Fatima Raza', 'title' => 'English & Communication', 'image' => 'teacher5.jpg', 'desc' => 'Improves students\' soft skills.'],
                ];
            @endphp --}}

                @foreach ($team as $member)
                    <div
                        class="bg-white/10 backdrop-blur-lg text-white rounded-3xl overflow-hidden shadow-xl transform transition hover:scale-105 hover:shadow-2xl">
                        <div class="h-56 w-full overflow-hidden">
                            <img src="{{ asset('storage/' . $member->profile_picture) }}"
                                class="object-cover ">


                        </div>
                        <div class="p-5">
                            <h3 class="text-xl font-bold mb-1">{{ $member['name'] }}</h3>
                            <p class="text-sm text-cyan-300 mb-2">{{ $member['education'] }}</p>
                            <p class="text-sm text-white/80">Age : {{ $member['age'] }}</p>
                            <p class="text-sm text-white/80">specialty : {{ $member['specialty'] }}</p>
                            <p class="text-sm text-white/80">Teacher of : {{ $member['course_id'] }}</p>


                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
