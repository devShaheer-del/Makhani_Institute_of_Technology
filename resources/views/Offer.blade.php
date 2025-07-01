@extends('Layout.Layout')


@section('title', 'Offers')



@section('content')
    <section class="bg-gradient-to-br from-blue-800 via-indigo-800 to-blue-900 text-white py-24">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-extrabold mb-6">What We Offer</h2>
            <p class="text-white/80 text-lg max-w-3xl mx-auto mb-12">
                Explore our industry-ready programs designed to boost your skills and launch your career. Each course is
                delivered by expert mentors and backed by real-world projects.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Course Card -->
                @foreach ([
            [
                'title' => 'Web Development',
                'desc' => 'Master front-end and back-end technologies to build full-stack web applications.',
                'classes' => 48,
                'duration' => '6 Months',
                'fee' => 'PKR 40,000',
            ],
            [
                'title' => 'Digital Marketing',
                'desc' => 'Learn SEO, PPC, social media, email marketing, and analytics from experts.',
                'classes' => 36,
                'duration' => '4 Months',
                'fee' => 'PKR 30,000',
            ],
            [
                'title' => 'CIT (Computer Information Technology)',
                'desc' => 'Comprehensive program covering basics of IT, MS Office, internet, and hardware.',
                'classes' => 30,
                'duration' => '3 Months',
                'fee' => 'PKR 18,000',
            ],
            [
                'title' => 'Graphics Designing',
                'desc' => 'Create stunning designs using Photoshop, Illustrator, and Canva for print and digital.',
                'classes' => 40,
                'duration' => '4 Months',
                'fee' => 'PKR 28,000',
            ],
            [
                'title' => 'Mobile App Development',
                'desc' => 'Build real-world Android and iOS apps using Flutter and Firebase.',
                'classes' => 50,
                'duration' => '6 Months',
                'fee' => 'PKR 45,000',
            ],
            [
                'title' => 'Freelancing & Upwork Training',
                'desc' => 'Learn how to earn online, win clients, and scale your freelancing business.',
                'classes' => 20,
                'duration' => '1.5 Months',
                'fee' => 'PKR 10,000',
            ],
        ] as $course)
                    <div
                        class="bg-white/10 p-6 rounded-2xl shadow-lg border border-white/10 hover:shadow-xl transition text-left">
                        <h3 class="text-2xl font-semibold text-cyan-300 mb-2">{{ $course['title'] }}</h3>
                        <p class="text-white/80 mb-4">{{ $course['desc'] }}</p>
                        <ul class="text-white/70 space-y-1 text-sm">
                            <li><strong>Total Classes:</strong> {{ $course['classes'] }}</li>
                            <li><strong>Duration:</strong> {{ $course['duration'] }}</li>
                            <li><strong>Course Fee:</strong> {{ $course['fee'] }}</li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
