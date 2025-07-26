@extends('Layout.Layout')

@section('title', 'Offers')

@section('content')

    <!-- AOS Animation Library -->
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

    <section class="bg-gradient-to-br from-blue-800 via-indigo-800 to-blue-900 text-white py-24">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-extrabold mb-6" data-aos="fade-down">What We Offer</h2>
            <p class="text-white/80 text-lg max-w-3xl mx-auto mb-12" data-aos="fade-up">
                Explore our industry-ready programs designed to boost your skills and launch your career. Each course is
                delivered by expert mentors and backed by real-world projects.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse ($course as $index => $item)
                    <div class="bg-gradient-to-br from-cyan-800 to-indigo-800 p-6 rounded-2xl shadow-xl border border-white/10 transition hover:scale-105 duration-300 text-left"
                        data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-2xl font-bold text-cyan-300">{{ $item->name }}</h3>
                            <span class="bg-white/20 text-sm text-white px-3 py-1 rounded-full">{{ $item->duration }}</span>
                        </div>
                        <p class="text-white/80 mb-5 text-sm leading-relaxed">
                            {{ $item->description }}
                        </p>

                        <div class="space-y-3 text-white/90 text-sm">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M4 3a1 1 0 000 2h12a1 1 0 100-2H4zM3 7a1 1 0 011-1h12a1 1 0 011 1v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7zm2 2v7h10V9H5z" />
                                </svg>
                                <span><strong>Classes:</strong> {{ $item->total_classes }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 9H9V6a1 1 0 112 0v5z" />
                                </svg>
                                <span><strong>Duration of Months:</strong> {{ $item->duration }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm.25-12.75a.75.75 0 01.75.75V9h1.5a.75.75 0 010 1.5H11v1a.75.75 0 01-1.5 0v-1H8a.75.75 0 010-1.5h1.5V6a.75.75 0 01.75-.75z" />
                                </svg>
                                <span><strong>Fee:</strong> {{ $item->fee }}</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="Enroll"
                                class="inline-block px-4 py-2 bg-cyan-600 hover:bg-cyan-500 text-white text-sm font-medium rounded-lg shadow transition">
                                Enroll Now
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-white text-lg col-span-full" data-aos="fade-up">No courses available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection
