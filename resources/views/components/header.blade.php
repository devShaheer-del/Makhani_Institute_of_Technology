<header x-data="{ mobileMenuOpen: false }"
    class="text-gray-600 body-font shadow-xl sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-blue-100">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center justify-between">
        <!-- Logo & Title -->
        <a href="/"
            class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 hover:opacity-90 transition duration-300">
            <div class="rounded-full flex items-center justify-center overflow-hidden">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="70" height="70"
                    class="rounded-full shadow-md hover:scale-105 transition duration-300">
            </div>
            <div class="ml-3 leading-tight">
                <span class="text-xl font-bold text-blue-800 block">Makhani Institute</span>
                <span class="text-sm text-center text-gray-500 tracking-wide block -mt-1">of Technology</span>
            </div>
        </a>

        <!-- Hamburger Button -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-700 focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{ 'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex flex-wrap items-center text-base justify-center space-x-4">
            @php
                $isLoggedIn = session()->has('user');
                $user = session('user');
                $navLinks = [
                    '/' => 'Home',
                    'About' => 'About Us',
                    'Team' => 'Team And Faculties',
                    'Offer' => 'What we Offer',
                    'Enroll' => 'Enroll Now',
                ];
            @endphp

            @foreach ($navLinks as $path => $label)
                <a href="/{{ $path === '/' ? '' : $path }}"
                    class="relative group px-2 py-1 text-gray-700 hover:text-blue-700 transition-all duration-300
                        {{ request()->is($path === '/' ? '/' : $path) ? 'font-semibold text-blue-700' : '' }}">
                    {{ $label }}
                    <span
                        class="absolute left-0 -bottom-1 w-0 h-0.5 bg-blue-600 transition-all duration-300 group-hover:w-full 
                        {{ request()->is($path === '/' ? '/' : $path) ? 'w-full' : '' }}"></span>
                </a>
            @endforeach

            @if ($isLoggedIn)
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="relative group px-3 py-1 text-white bg-gradient-to-r from-indigo-600 to-blue-600 rounded-full font-semibold shadow hover:from-indigo-700 hover:to-blue-700 transition flex items-center space-x-1">
                        <span>Student Info</span>
                        <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-50">

                        {{-- Student Portal (Always visible if logged in) --}}
                        <a href="/StudentProfile" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition">
                            Student Profile
                        </a>

                        {{-- Admin Portal (Only if admin) --}}
                        @if ($user['email'] === 'admin@admin.com')
                            <a href="/Admin" target="_blank"
                                class="block px-4 py-2 text-gray-700 hover:bg-blue-50 transition">
                                Admin Portal
                            </a>
                        @endif
                    </div>
                </div>
            @endif

        </nav>

        <!-- Desktop Actions -->
        <div class="hidden md:flex items-center space-x-2">
            <a href="/Contact"
                class="inline-flex items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium py-2 px-4 rounded-full shadow-md hover:scale-105 hover:shadow-xl transition-transform duration-300">
                Contact Us
            </a>

            @if ($isLoggedIn)
                <form action="/Logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center bg-red-500 text-white py-2 px-4 rounded-full shadow hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="/Signup"
                    class="inline-flex items-center bg-white border border-blue-500 text-blue-700 py-2 px-4 rounded-full shadow hover:bg-blue-50 hover:scale-105 hover:shadow-md transition-transform duration-300">
                    Sign Up
                </a>
            @endif
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white/95 border-t border-blue-100">
        <div class="flex flex-col space-y-2 px-6 py-4 text-gray-700">
            @foreach ($navLinks as $path => $label)
                <a href="/{{ $path === '/' ? '' : $path }}"
                    class="block py-1 px-2 rounded hover:bg-blue-50 {{ request()->is($path === '/' ? '/' : $path) ? 'text-blue-700 font-semibold' : '' }}">
                    {{ $label }}
                </a>
            @endforeach

            @if ($isLoggedIn && $user['email'] === 'admin@admin.com')
                <a href="/Admin"
                    class="block py-2 px-3 rounded text-white bg-gradient-to-r from-indigo-600 to-blue-600 font-semibold shadow hover:from-indigo-700 hover:to-blue-700 transition">
                    Admin Portal
                </a>
            @endif

            <a href="/Contact"
                class="block py-2 px-3 rounded text-white bg-gradient-to-r from-blue-500 to-indigo-600 font-medium shadow hover:scale-105 hover:shadow-xl transition">
                Contact Us
            </a>

            @if ($isLoggedIn)
                <form action="/Logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full text-left py-2 px-3 rounded bg-red-500 text-white shadow hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="/Signup"
                    class="block py-2 px-3 rounded border border-blue-500 text-blue-700 bg-white shadow hover:bg-blue-50 transition">
                    Sign Up
                </a>
            @endif
        </div>
    </div>
</header>
