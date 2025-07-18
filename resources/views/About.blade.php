@extends('Layout.Layout')

@section('title', 'About Us')

@section('content')

    <!-- Hero Section -->
    <section class="bg-gradient-to-br from-blue-700 via-indigo-700 to-blue-900 text-white py-24" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Text Content -->
            <div data-aos="fade-right">
                <h2 class="text-4xl font-extrabold mb-6 leading-tight">
                    Empowering the Next Generation of Tech Leaders
                </h2>
                <p class="text-white/90 text-lg mb-4">
                    Makhani Institute of Technology is more than just a place to learn—it's a place to innovate, explore,
                    and grow.
                    With state-of-the-art labs, industry-focused curriculum, and mentorship from tech experts, we prepare
                    students
                    to lead the future of technology.
                </p>
                <p class="text-white/70 mb-6">
                    Our mission is to close the gap between education and industry by delivering hands-on, real-world
                    learning experiences.
                    We believe in empowering our students through practical knowledge, creativity, and collaboration.
                </p>
                <a href="#programs"
                    class="inline-block bg-white text-blue-800 font-semibold px-6 py-3 rounded-full hover:bg-cyan-200 transition">
                    Discover Our Programs
                </a>
            </div>

            <!-- Right Feature Box -->
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl shadow-xl border border-white/20" data-aos="fade-left">
                <h3 class="text-2xl font-bold mb-4 text-cyan-200">Why Makhani Institute?</h3>
                <ul class="space-y-4 text-white/90">
                    <li class="flex items-start gap-3">
                        <span class="text-cyan-300">✔</span>
                        <span>Modern curriculum aligned with industry trends</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-cyan-300">✔</span>
                        <span>Experienced faculty & real-world mentors</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-cyan-300">✔</span>
                        <span>Dedicated career support & internship opportunities</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="text-cyan-300">✔</span>
                        <span>Inclusive, innovative, and inspiring learning environment</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="bg-white py-20" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12" data-aos="zoom-in">
                <h2 class="text-3xl font-extrabold text-indigo-700">Our Core Values</h2>
                <p class="text-gray-600 mt-2 text-lg">We are guided by principles that shape our culture and outcomes.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-blue-50 p-6 rounded-2xl shadow" data-aos="zoom-in" data-aos-delay="100">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Innovation</h3>
                    <p class="text-gray-600">We foster creativity and embrace emerging technologies in everything we do.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-2xl shadow" data-aos="zoom-in" data-aos-delay="200">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Integrity</h3>
                    <p class="text-gray-600">We uphold honesty, responsibility, and ethics in all interactions and
                        decisions.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-2xl shadow" data-aos="zoom-in" data-aos-delay="300">
                    <h3 class="text-xl font-semibold text-blue-800 mb-2">Excellence</h3>
                    <p class="text-gray-600">We strive for the highest quality in education, research, and service.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Mentors -->
    <section class="bg-gradient-to-br from-indigo-800 via-blue-900 to-indigo-900 text-white py-20" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4" data-aos="zoom-in">Meet Our Mentors</h2>
            <p class="text-white/80 mb-10 text-lg" data-aos="fade-up">Driven by experience, inspired by innovation — our
                leaders shape futures.</p>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white/10 p-6 rounded-2xl shadow backdrop-blur-md border border-white/10" data-aos="fade-up"
                    data-aos-delay="100">
                    <h3 class="text-xl font-semibold text-cyan-200">Dr. Adeel Makhani</h3>
                    <p class="text-white/80">Founder & Director</p>
                </div>
                <div class="bg-white/10 p-6 rounded-2xl shadow backdrop-blur-md border border-white/10" data-aos="fade-up"
                    data-aos-delay="200">
                    <h3 class="text-xl font-semibold text-cyan-200">Sarah Khan</h3>
                    <p class="text-white/80">Lead Curriculum Designer</p>
                </div>
                <div class="bg-white/10 p-6 rounded-2xl shadow backdrop-blur-md border border-white/10" data-aos="fade-up"
                    data-aos-delay="300">
                    <h3 class="text-xl font-semibold text-cyan-200">Ali Raza</h3>
                    <p class="text-white/80">Tech Innovation Lead</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-blue-50 py-20" data-aos="fade-up">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-indigo-700 mb-6" data-aos="zoom-in">What Our Students Say</h2>
            <div class="grid md:grid-cols-2 gap-10 text-left">
                <div class="bg-white p-6 rounded-2xl shadow-md border" data-aos="flip-left" data-aos-delay="100">
                    <p class="text-gray-700 italic">"The instructors at MIT are amazing. Their teaching style and mentorship
                        truly transformed my career."</p>
                    <p class="mt-4 font-semibold text-blue-800">— Ayesha J., Web Development Graduate</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-md border" data-aos="flip-left" data-aos-delay="200">
                    <p class="text-gray-700 italic">"I gained real-world skills through hands-on projects. This institute
                        gave me the confidence to launch my own startup."</p>
                    <p class="mt-4 font-semibold text-blue-800">— Hamza K., CIT Alumni</p>
                </div>
            </div>
        </div>
    </section>

@endsection
