@extends('Layout.Layout')

@section('title', 'Home | Makhani Institute of Technology')
@section('meta_keywords', 'IT institute in Pakistan, Web Development, Graphic Designing, Mobile App Development, CIT,
    Digital Marketing, Makhani Institute')
@section('meta_description', 'Join Makhani Institute of Technology – Pakistan’s leading private tech institute offering
    expert-led courses in Web Development, CIT, Graphic Design, and more.')

@section('content')

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    <section class="relative bg-gradient-to-br from-blue-700 via-indigo-700 to-blue-900 text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 py-24 lg:flex lg:items-center lg:justify-between">
            <!-- Text Content -->
            <div class="max-w-2xl" data-aos="fade-right">
                <span>Mr.
                    <strong>
                        @if (session('user'))
                            <span class="text-cyan-300">
                                {{ session('user')['name'] }}
                            </span><br>
                        @endif
                    </strong>
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                    Welcome to <br>
                    <span class="bg-gradient-to-r from-cyan-300 to-blue-100 text-transparent bg-clip-text">
                        Makhani Institute of Technology
                    </span>
                </h1>

                <p class="text-lg md:text-xl mb-4 text-white/90">
                    Building the future of tech with advanced learning, expert mentors, and real-world skills.
                </p>

                <!-- Typewriter Text -->
                <p class="text-lg md:text-xl font-semibold text-cyan-200 mb-8 h-10">
                    We offer <span id="typewriter" class="border-r-2 border-cyan-200 animate-pulse"></span>
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="Enroll"
                        class="bg-white text-blue-800 font-semibold px-6 py-3 rounded-full shadow-md hover:bg-cyan-200 transition duration-300">
                        Apply Now
                    </a>
                    <a href="/Content"
                        class="bg-transparent border border-white px-6 py-3 rounded-full hover:bg-white hover:text-blue-800 transition duration-300">
                        Media Content
                    </a>
                </div>
            </div>

            <!-- Image -->
            <div class="mt-12 lg:mt-0" data-aos="fade-left">
                <img src="{{ asset('images/banner.png') }}" alt="Students at Makhani Institute"
                    class="w-full max-w-md rounded-xl shadow-lg">
            </div>
        </div>

        <!-- Decorative Shape -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-blue-900 rounded-full opacity-30 blur-3xl animate-pulse"></div>
    </section>

    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-6 text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                Our Popular Courses
            </h2>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
                Learn in-demand tech skills with hands-on training from industry professionals.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- CIT -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 text-white p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 20h9" />
                            <path d="M3 4h18v12H3z" />
                            <path d="M7 20v-4h10v4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">CIT</h3>
                    <p class="text-sm opacity-90">Computer Information Technology fundamentals for beginners and
                        professionals.</p>
                </div>

                <!-- Graphic Designing -->
                <div class="bg-gradient-to-br from-indigo-600 to-indigo-800 text-white p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 20l9-4-9-4-9 4 9 4z" />
                            <path d="M12 12V4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Graphic Designing</h3>
                    <p class="text-sm opacity-90">Master tools like Photoshop, Illustrator, and Figma to create stunning
                        designs.</p>
                </div>

                <!-- Web Development -->
                <div class="bg-gradient-to-br from-cyan-600 to-blue-700 text-white p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300"
                    data-aos="zoom-in" data-aos-delay="300">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M3 4h18v16H3z" />
                            <path d="M9 20V4" />
                            <path d="M15 20V4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                    <p class="text-sm opacity-90">Learn HTML, CSS, JavaScript, and modern frameworks to build responsive
                        websites.</p>
                </div>

                <!-- Mobile App Development -->
                <div class="bg-gradient-to-br from-sky-600 to-blue-800 text-white p-8 rounded-2xl shadow-lg hover:scale-105 transition duration-300"
                    data-aos="zoom-in" data-aos-delay="400">
                    <div class="mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <rect width="14" height="20" x="5" y="2" rx="2" />
                            <path d="M12 18h.01" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Mobile App Development</h3>
                    <p class="text-sm opacity-90">Build Android & iOS apps using Flutter, React Native, or Kotlin.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Typewriter Script -->
    <script>
        const phrases = ["CIT", "Graphics Designing", "Web Development", "Mobile App Development"];
        const el = document.getElementById("typewriter");

        let index = 0;
        let charIndex = 0;
        let isDeleting = false;
        let currentText = '';
        let delay = 100;

        function type() {
            const fullText = phrases[index];

            if (isDeleting) {
                currentText = fullText.substring(0, charIndex--);
            } else {
                currentText = fullText.substring(0, charIndex++);
            }

            el.textContent = currentText;

            if (!isDeleting && charIndex === fullText.length) {
                isDeleting = true;
                delay = 1500;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                index = (index + 1) % phrases.length;
                delay = 500;
            } else {
                delay = isDeleting ? 50 : 100;
            }

            setTimeout(type, delay);
        }

        document.addEventListener("DOMContentLoaded", type);
    </script>

    <!-- Passout Statistics Section -->
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20" data-aos="fade-up">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Passout Statistics</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-500">
                    Overview of students who completed various technical courses.
                </p>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 xl:w-1/4 md:w-1/2 w-full" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-full p-6 rounded-lg border-2 border-blue-500 flex flex-col relative overflow-hidden">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-blue-500">CIT</h2>
                        <h1 class="text-5xl text-gray-900 leading-none pb-4 mb-4 border-b border-gray-200">
                            {{ $courseCounts['CIT'] ?? 0 }}
                        </h1>
                        <p class="text-gray-600 mb-6">Students passed the Computer Information Technology course.</p>
                        <button class="mt-auto text-white bg-blue-500 hover:bg-blue-600 py-2 px-4 rounded">View
                            Details</button>
                    </div>
                </div>

                <div class="p-4 xl:w-1/4 md:w-1/2 w-full" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-full p-6 rounded-lg border-2 border-green-500 flex flex-col relative overflow-hidden">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-green-500">Graphics</h2>
                        <h1 class="text-5xl text-gray-900 leading-none pb-4 mb-4 border-b border-gray-200">
                            {{ $courseCounts['Graphics'] ?? 0 }}
                        </h1>
                        <p class="text-gray-600 mb-6">Graduates from the Graphic Design course.</p>
                        <button class="mt-auto text-white bg-green-500 hover:bg-green-600 py-2 px-4 rounded">View
                            Details</button>
                    </div>
                </div>

                <div class="p-4 xl:w-1/4 md:w-1/2 w-full" data-aos="fade-up" data-aos-delay="300">
                    <div class="h-full p-6 rounded-lg border-2 border-purple-500 flex flex-col relative overflow-hidden">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-purple-500">Web Development
                        </h2>
                        <h1 class="text-5xl text-gray-900 leading-none pb-4 mb-4 border-b border-gray-200">
                            {{ $courseCounts['Web Development'] ?? 0 }}
                        </h1>
                        <p class="text-gray-600 mb-6">Alumni from the Web Development bootcamp.</p>
                        <button class="mt-auto text-white bg-purple-500 hover:bg-purple-600 py-2 px-4 rounded">View
                            Details</button>
                    </div>
                </div>

                <div class="p-4 xl:w-1/4 md:w-1/2 w-full" data-aos="fade-up" data-aos-delay="400">
                    <div class="h-full p-6 rounded-lg border-2 border-yellow-500 flex flex-col relative overflow-hidden">
                        <h2 class="text-sm tracking-widest title-font mb-1 font-medium text-yellow-500">Mobile App
                            Development</h2>
                        <h1 class="text-5xl text-gray-900 leading-none pb-4 mb-4 border-b border-gray-200">
                            {{ $courseCounts['Mobile App Development'] ?? 0 }}
                        </h1>
                        <p class="text-gray-600 mb-6">Students trained under mobile app mentorship programs.</p>
                        <button class="mt-auto text-white bg-yellow-500 hover:bg-yellow-600 py-2 px-4 rounded">View
                            Details</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: false // 👈 this ensures animation works both on scroll down and scroll up
        });
    </script>

@endsection
