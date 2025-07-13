    @extends('Admin.Admin_Layout.AdminLayout')

    @section('title', 'Add Course')

    @section('content')

        @if (session('error'))
            <div id="success-alert"
                class="bg-red-500 text-white font-semibold p-4 rounded-xl mb-4 text-center shadow-lg transition-opacity duration-500">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div id="success-alert"
                class="bg-green-500 text-white font-semibold p-4 rounded-xl mb-4 text-center shadow-lg transition-opacity duration-500">
                {{ session('success') }}
            </div>
        @endif
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow">
            <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">Create Courses</h1>
        <p class="text-base mt-2">Manage and review Courses' here.</p>
    </div>

            @if (session('success'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <form action="CreateCourse" method="POST">
                @csrf

                <!-- Course Name -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="name">Course Name</label>
                    <input type="text" required id="name" name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="discription">Description</label>
                    <textarea id="description" required name="description"  rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required></textarea>
                </div>

                <!-- Total Classes -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="total_classes">Total Classes</label>
                    <input type="number" id="total_classes" name="total_classes"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Duration -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2" for="duration">Duration (e.g. 3 Months)</label>
                    <input type="text" required id="duration" name="duration"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Course Fee -->
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2" for="fee">Course Fee (in PKR)</label>
                    <input type="number" id="fee" required name="fee" step="0.01"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    @endsection
