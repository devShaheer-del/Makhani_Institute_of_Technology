@extends('Layout.Layout')



@section('title', 'Course Detail')



@section('content')
    <section class="bg-gradient-to-br from-blue-800 via-indigo-800 to-blue-900 text-white min-h-screen py-20">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Hero -->
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">{{ $course->title }}</h1>
                <p class="text-lg text-white/80 max-w-2xl mx-auto">
                    {{ $course->short_description ?? 'Join our comprehensive course to gain hands-on expertise and accelerate your career.' }}
                </p>
            </div>

            <!-- Course Overview -->
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl shadow-xl border border-white/20 mb-12">
                <h2 class="text-2xl font-bold text-cyan-300 mb-4">Course Overview</h2>
                <p class="text-white/80 text-lg leading-relaxed">
                    {{ $course->description ?? 'This course is designed to take you from beginner to advanced. Whether you want to work professionally or freelance, this program equips you with the tools, techniques, and confidence to succeed.' }}
                </p>
            </div>

            <!-- What You Will Learn -->
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-cyan-300 mb-6">What You'll Learn</h2>
                <ul class="space-y-3 text-white/90 list-disc list-inside">
                    @foreach ($course->modules as $module)
                        <li>{{ $module }}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Course Details Box -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white/10 p-6 rounded-2xl border border-white/10">
                    <h3 class="text-xl font-semibold mb-4 text-cyan-200">Course Details</h3>
                    <ul class="text-white/80 space-y-2 text-base">
                        <li><strong>Total Classes:</strong> {{ $course->total_classes }}</li>
                        <li><strong>Duration:</strong> {{ $course->duration }}</li>
                        <li><strong>Course Fee:</strong> {{ $course->fee }}</li>
                        <li><strong>Level:</strong> {{ $course->level ?? 'Beginner to Advanced' }}</li>
                        <li><strong>Mode:</strong> {{ $course->mode ?? 'On-Campus / Online' }}</li>
                    </ul>
                </div>

                <!-- CTA Enroll -->
                <div class="flex flex-col justify-center items-start">
                    <h4 class="text-xl font-semibold mb-4">Ready to Get Started?</h4>
                    <p class="text-white/70 mb-6">
                        Secure your seat now and begin your journey toward a successful tech career.
                    </p>
                    <a href="/apply?course={{ $course->slug }}"
                        class="bg-white text-blue-800 font-semibold px-6 py-3 rounded-full shadow hover:bg-cyan-200 transition">
                        Enroll in {{ $course->title }}
                    </a>
                </div>
            </div>

            <!-- Optional: Testimonial or Image Banner -->
            <div class="mt-12 text-center">
                <img src="{{ $course->banner ?? '/images/default-banner.jpg' }}" alt="Course banner"
                    class="mx-auto rounded-2xl shadow-lg w-full max-w-4xl">
            </div>

        </div>
    </section>

@endsection
