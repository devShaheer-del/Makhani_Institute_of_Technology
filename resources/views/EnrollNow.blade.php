@extends('Layout.Layout')

@section('title', 'Enroll Now')

@section('content')

    @if (session('success'))
        <div id="success-alert"
            class="bg-green-500 text-white font-semibold p-4 rounded-xl mb-4 text-center shadow-lg transition-opacity duration-500 ease-in-out opacity-100">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const alertBox = document.getElementById('success-alert');
                if (alertBox) {
                    alertBox.classList.add('opacity-0');
                    setTimeout(() => alertBox.remove(), 500); // Wait for opacity transition
                }
            }, 3000);
        </script>
    @endif

    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-600 via-blue-500 to-cyan-400 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl w-full bg-white shadow-xl rounded-2xl p-10 space-y-6">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-800">Enroll Now</h2>
                <p class="mt-2 text-sm text-gray-500">Join our community and start your learning journey today!</p>
            </div>

            <form action="EnrollStudent" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Contact Number -->
                <div>
                    <label for="contact" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="tel" name="number" id="contact" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Age -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" name="age" id="age" min="10" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender" id="gender" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">-- Select Gender --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Last Education -->
                <div>
                    <label for="education" class="block text-sm font-medium text-gray-700">Last Education</label>
                    <select name="education" id="education" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">-- Select Education --</option>
                        <option value="Matric">Matric</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Graduate">Graduate</option>
                        <option value="Post Graduate">Post Graduate</option>
                    </select>
                </div>

                <!-- Course -->
                <div>
                    <label for="course" class="block text-sm font-medium text-gray-700">Select Course</label>
                    <select name="course" id="course" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">-- Choose a course --</option>
                        <option value="CIT">CIT</option>
                        <option value="Graphics">Graphics</option>
                        <option value="Web Development">Web Development</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="col-span-1 md:col-span-2">
                    <button type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-cyan-500 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-cyan-600 transition ease-in-out duration-300 shadow-md">
                        Enroll Now
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
