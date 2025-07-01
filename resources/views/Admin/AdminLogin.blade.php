@extends('Admin.Admin_Layout.AdminLayout')


@section('content')
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-700 via-blue-600 to-cyan-500 p-6">
        <div class="bg-white shadow-2xl rounded-2xl w-full max-w-md p-8 space-y-6">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-gray-800">Admin Login</h1>
                <p class="text-sm text-gray-500 mt-1">Makhani Institute of Technology</p>
            </div>

            <form action="AdminLogin" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" id="email" name="email" placeholder="admin@example.com" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                    Sign In
                </button>
            </form>
        </div>
    </div>
@endsection
