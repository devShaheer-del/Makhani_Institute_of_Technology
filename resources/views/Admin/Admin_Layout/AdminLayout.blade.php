<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makhani Institute - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400..800&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: "Baloo Da 2", sans-serif;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed z-30 inset-y-0 left-0 w-64 bg-gradient-to-br from-indigo-700 to-cyan-600 text-white transform transition-transform duration-200 ease-in-out md:translate-x-0 md:static md:inset-0 flex flex-col overflow-y-auto">
            
            <div>
                <div class="p-6 text-center border-b border-white/20">
                    <div class="flex justify-center mb-2">
                        <img src="{{ asset('images/logo.png') }}" alt="" width="100" height="100">
                    </div>
                    <h1 class="text-2xl font-bold tracking-wide">Makhani Institute</h1>
                    <p class="text-sm text-cyan-100 mt-1">Admin Panel</p>
                </div>

                @php
                    $admin = session('admin');
                @endphp

                @if ($admin)
                    <nav class="px-4 py-6 space-y-4">

                        <!-- Students Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Students
                                <svg :class="{ 'rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition x-cloak class="pl-4 mt-1 space-y-1">
                                <a href="/GetAllStudents"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">All
                                    Students</a>
                                <a href="/AddStudent"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Add
                                    Student</a>
                                <a href="/admin/students/reports"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Student
                                    Reports</a>
                            </div>
                        </div>

                        <!-- Courses Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Courses
                                <svg :class="{ 'rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition x-cloak class="pl-4 mt-1 space-y-1">
                                <a href="/GetCourses"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">All
                                    Courses</a>
                                <a href="/AddCourse"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Add
                                    Course</a>
                            </div>
                        </div>

                        <!-- Faculty Dropdown -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Faculty
                                <svg :class="{ 'rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition x-cloak class="pl-4 mt-1 space-y-1">
                                <a href="/AllFaculties"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">All
                                    Faculty</a>
                                <a href="/AddFaculty"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Add
                                    Faculty</a>
                            </div>
                        </div>

                        <!-- Media Upload -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Upload Media Content
                                <svg :class="{ 'rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition x-cloak class="pl-4 mt-1 space-y-1">
                                <a href="/UploadImage"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Add Images</a>
                                <a href="/DisplayImagesAdmin"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Show Gallery
                                    Content</a>
                            </div>
                        </div>

                        <!-- Graduates -->
                        <div x-data="{ open: false }">
                            <button @click="open = !open"
                                class="w-full text-left flex items-center justify-between px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700 transition">
                                Makhani Graduates Detail
                                <svg :class="{ 'rotate-180': open }"
                                    class="w-4 h-4 transition-transform duration-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="open" x-transition x-cloak class="pl-4 mt-1 space-y-1">
                                <a href="/AddGardutes"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Add Graduate
                                    Student</a>
                                <a href="/ShowGraduates"
                                    class="block px-4 py-2 rounded hover:bg-white hover:text-indigo-700">Show Manage
                                    Graduate Student</a>
                            </div>
                        </div>

                        <!-- Static Links -->
                        <a href="/GetData"
                            class="block px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700">Contact</a>
                        <a href="/EnrollRequests"
                            class="block px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700">Enroll Requests</a>

                        <!-- Create Admin -->
                        @if ($admin && $admin->email === 'admin@admin.com')
                            <a href="/AdminSignup"
                                class="block px-4 py-2 rounded-lg hover:bg-white hover:text-indigo-700">Create
                                Admin</a>
                        @endif
                    </nav>
                @endif
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- Topbar -->
            <header class="bg-white shadow p-4 flex items-center justify-between md:justify-between">
                <!-- Sidebar toggle button -->
                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <h2 class="text-xl font-semibold text-gray-700">@yield('title')</h2>

                <!-- Admin and Logout -->
                @if ($admin)
                    <div class="flex items-center gap-4 text-sm text-gray-700">
                        <span class="hidden sm:inline">Welcome, {{ $admin->name }}</span>
                        <form action="/AdminLogout" method="POST">
                            @csrf
                            <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg text-sm">
                                Logout
                            </button>
                        </form>
                    </div>
                @endif
            </header>

            <!-- Page content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
