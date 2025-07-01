    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Makhani Institute - @yield('title')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
        <link
            href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@400..800&family=Baloo+Da+2:wght@400..800&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
            rel="stylesheet">
    </head>

    <style>
        * {
            font-family: "Baloo Da 2", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;

        }
    </style>

    <body class="bg-gray-100 font-sans antialiased">

        <div class="flex h-screen overflow-hidden">

            <!-- Sidebar -->
            <!-- Sidebar -->
            <!-- Sidebar -->
            <!-- Sidebar -->
            <aside class="w-64 bg-gradient-to-br from-indigo-700 to-cyan-600 text-white flex flex-col">
                <div class="p-6 text-center border-b border-white/20">
                    <div class="flex justify-center mb-2">
                        <img src="{{ asset('images/logo.png') }}" alt="" width="100" height="100">
                    </div>
                    <h1 class="text-2xl font-bold tracking-wide">Makhani Institute</h1>
                    <p class="text-sm text-cyan-100 mt-1">Admin Panel</p>
                </div>

                @if (session('admin'))
                    <nav class="flex-1 px-4 py-6 space-y-4">

                        <!-- Students Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Students
                                <svg :class="{ 'transform rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" class="pl-4 mt-1 space-y-1" x-cloak>
                                <a href="/GetAllStudents"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">All
                                    Students</a>
                                <a href="/AddStudent"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">Add
                                    Student</a>
                                <a href="/admin/students/reports"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">Student
                                    Reports</a>
                            </div>
                        </div>

                        <!-- Courses Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Courses
                                <svg :class="{ 'transform rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" class="pl-4 mt-1 space-y-1" x-cloak>
                                <a href="GetCourses"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">All
                                    Courses</a>
                                <a href="/AddCourse"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">Add
                                    Course</a>

                            </div>
                        </div>

                        <!-- Reports Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Reports
                                <svg :class="{ 'transform rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" class="pl-4 mt-1 space-y-1" x-cloak>
                                <a href="/admin/reports/student"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">Student
                                    Reports</a>
                                <a href="/admin/reports/course"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">Course
                                    Reports</a>
                                <a href="/admin/reports/faculty"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">Faculty
                                    Reports</a>
                            </div>
                        </div>

                        <!-- Faculty Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Faculty
                                <svg :class="{ 'transform rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" class="pl-4 mt-1 space-y-1" x-cloak>
                                <a href="/AllFaculties"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">All
                                    Faculty</a>
                                <a href="/AddFaculty"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700 transition">Add
                                    Faculty</a>
                            </div>
                        </div>


                        <a href="GetData"
                            class="block px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                            Contact
                        </a>

                        @php
                            $IslogginAdmin = session()->has('admin');
                            $admin = session('admin');
                        @endphp

                        @if ($IslogginAdmin && $admin->email === 'admin@admin.com')
                            <a href="/AdminSignup"
                                class="block px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Create Admin
                            </a>
                        @endif


                    </nav>
                @endif

                <div class="p-4 border-t border-white/20 text-center">
                    <form action="AdminLogout" method="POST">
                        @csrf
                        <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-sm">
                            Logout
                        </button>
                    </form>
                </div>
            </aside>

            <!-- AlpineJS for dropdowns -->
            <script src="//unpkg.com/alpinejs" defer></script>


            <!-- Add AlpineJS -->
            <script src="//unpkg.com/alpinejs" defer></script>


            <!-- Add AlpineJS for dropdown to work -->
            <script src="//unpkg.com/alpinejs" defer></script>

            <!-- Main Content -->
            <div class="flex-1 flex flex-col overflow-y-auto">
                <!-- Top Navbar -->
                <header class="bg-white shadow p-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-700">@yield('title')</h2>
                    <span class="text-gray-500 text-sm">Welcome, Admin</span>
                </header>

                <!-- Page Content -->
                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>

    </body>

    </html>
