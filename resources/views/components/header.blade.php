<header
    class="text-gray-600 body-font shadow-xl sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-blue-100">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <!-- Logo & Title -->
        <a href="/"
            class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 hover:opacity-90 transition duration-300">
            <div class="rounded-full flex items-center justify-center overflow-hidden">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="90" height="90"
                    class="rounded-full shadow-md hover:scale-105 transition duration-300">
            </div>
            <div class="ml-3 leading-tight">
                <span class="text-xl font-bold text-blue-800 block">Makhani Institute</span>
                <span class="text-sm text-center text-gray-500 tracking-wide block -mt-1">of Technology</span>
            </div>
        </a>

        <!-- Navigation Links -->
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center space-x-4">
            @php
                $isLoggedIn = session()->has('user');
                $user = session('user');
                $navLinks = [
                    '/' => 'Home',
                    'About' => 'About Us',
                    'Team' => 'Team And Faculties',
                ];

                if ($isLoggedIn) {
                    $navLinks['Offer'] = 'What we Offer';
                    $navLinks['Enroll'] = 'Enroll Now';
                }
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

            {{-- Show Admin Portal link if admin is logged in --}}
            @if ($isLoggedIn && $user->email === 'admin@admin.com')
                <a href="/Admin"
                    class="relative group px-3 py-1 text-white bg-gradient-to-r from-indigo-600 to-blue-600 rounded-full font-semibold shadow hover:from-indigo-700 hover:to-blue-700 transition">
                    Admin Portal
                </a>
            @endif

            {{-- Logged in user's name --}}

        </nav>

        <!-- Action Buttons -->
        <div class="flex items-center space-x-2 mt-4 md:mt-0">
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
</header>
