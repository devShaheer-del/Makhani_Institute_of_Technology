@extends('Layout.Layout')

@section('title', 'Home | Makhani Institute of Technology')
@section('meta_keywords',
    'IT institute in Pakistan, Web Development, Graphic Designing, Mobile App Development, CIT,
    Digital Marketing, Makhani Institute')
@section('meta_description',
    'Join Makhani Institute of Technology – Pakistan’s leading private tech institute offering
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

                <!-- Search Box -->
                <div class="mt-6 mb-8" data-aos="fade-up">
                    <form action="{{ route('GraduatesDetails') }}" method="GET"
                        class="flex flex-col sm:flex-row items-center gap-3">
                        <input type="text" name="personal_id" placeholder="Find Makhani Graduates with Student Unique Id"
                            class="w-full sm:w-96 px-4 py-3 rounded-full border border-gray-300 focus:ring-2 focus:ring-cyan-400 focus:outline-none text-gray-700 shadow-sm"
                            required>
                        <button type="submit"
                            class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-full shadow-md hover:scale-105 hover:shadow-xl transition duration-300">
                            Find Student
                        </button>
                    </form>
                </div>


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
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-6 lg:px-16">
            <!-- Heading -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900">Passout Statistics</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    Overview of students who successfully completed their courses at <span
                        class="font-semibold text-indigo-600">Makhani Institute of Technology</span>.
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- CIT -->

                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-6 text-center border-t-4 border-blue-500"
                    data-aos="fade-up" data-aos-delay="100">
                    <div
                        class="flex justify-center items-center w-16 h-16 rounded-full  text-blue-600 mx-auto mb-4">
                        <i class="fas fa-desktop text-2xl">
                            <img src="{{ asset('images/office.png') }}" alt="">

                        </i>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-700">CIT</h2>
                    <p class="text-5xl font-bold text-gray-900 my-3">{{ $courseCounts['CIT'] ?? 0 }}</p>
                    <p class="text-gray-500 mb-6">Computer Information Technology graduates.</p>
                    <button onclick="window.location.href='{{ route('graduates.byCourse', 'CIT') }}'"
                        class="px-6 py-2 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold shadow hover:scale-105 transition">
                        View Details
                    </button>
                </div>

                <!-- Graphics -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-6 text-center border-t-4 border-green-500"
                    data-aos="fade-up" data-aos-delay="200">
                    <div
                        class="flex justify-center items-center w-16 h-16 rounded-full  text-green-600 mx-auto mb-4">
                        <i class="fas fa-paint-brush text-2xl">
                            <img src="{{ asset('images/graphics.png') }}" alt="">
                        </i>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-700">Graphics</h2>
                    <p class="text-5xl font-bold text-gray-900 my-3">{{ $courseCounts['Graphics'] ?? 0 }}</p>
                    <p class="text-gray-500 mb-6">Graphic Design course graduates.</p>
                    <button onclick="window.location.href='{{ route('graduates.byCourse', 'Graphics') }}'"
                        class="px-6 py-2 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold shadow hover:scale-105 transition">
                        View Details
                    </button>
                </div>

                <!-- Web Development -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-6 text-center border-t-4 border-purple-500"
                    data-aos="fade-up" data-aos-delay="300">
                    <div
                        class="flex justify-center items-center w-16 h-16 rounded-full  text-purple-600 mx-auto mb-4">
                        <i class="fas fa-code text-2xl">
                            <img src="{{ asset('images/web.png') }}" alt="">
                        </i>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-700">Web Development</h2>
                    <p class="text-5xl font-bold text-gray-900 my-3">{{ $courseCounts['Web Development'] ?? 0 }}</p>
                    <p class="text-gray-500 mb-6">Alumni from our Web Development bootcamp.</p>
                    <button onclick="window.location.href='{{ route('graduates.byCourse', 'Web Development') }}'"
                        class="px-6 py-2 rounded-full bg-gradient-to-r from-purple-500 to-pink-600 text-white font-semibold shadow hover:scale-105 transition">
                        View Details
                    </button>
                </div>

                <!-- Mobile App Development -->
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition p-6 text-center border-t-4 border-yellow-500"
                    data-aos="fade-up" data-aos-delay="400">
                    <div
                        class="flex justify-center items-center w-16 h-16 rounded-full  text-yellow-600 mx-auto mb-4">
                        <i class="fas fa-mobile-alt text-2xl">
                            <img src="{{ asset('images/app.png') }}" alt="">
                        </i>
                    </div>
                    <h2 class="text-lg font-semibold text-gray-700">Mobile App Development</h2>
                    <p class="text-5xl font-bold text-gray-900 my-3">{{ $courseCounts['Mobile App Development'] ?? 0 }}</p>
                    <p class="text-gray-500 mb-6">Mobile application development graduates.</p>
                    <button onclick="window.location.href='{{ route('graduates.byCourse', 'Mobile App Development') }}'"
                        class="px-6 py-2 rounded-full bg-gradient-to-r from-yellow-500 to-orange-500 text-white font-semibold shadow hover:scale-105 transition">
                        View Details
                    </button>
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
