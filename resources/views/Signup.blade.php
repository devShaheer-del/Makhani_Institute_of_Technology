@extends('Layout.Layout')

@section('title', 'SignUp')

@section('content')
    @if (session('success'))
        <div id="success-alert"
            class="bg-green-500 text-white font-semibold p-4 rounded-xl mb-4 text-center shadow-lg transition-opacity duration-500">
            {{ session('success') }}
        </div>

        <script>
            // Hide success alert after 3 seconds
            setTimeout(() => {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.classList.add('opacity-0');
                    setTimeout(() => alert.remove(), 500); // remove after fade
                }
            }, 3000);
        </script>
    @endif

    <section class="min-h-screen bg-gradient-to-br from-blue-800 via-indigo-800 to-blue-900 flex items-center justify-center px-4">
        <div class="bg-white/10 backdrop-blur-md p-8 md:p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/20">
            <h2 class="text-3xl font-bold text-white mb-6 text-center">Create Your Account</h2>

            <form action="UserRegisterd" method="POST" class="space-y-5">
                @csrf
                <!-- Name -->
                <div>
                    <label class="block text-white/80 mb-1" for="name">Full Name</label>
                    <input type="text" name="name" id="name" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-white/80 mb-1" for="email">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-white/80 mb-1" for="password">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-cyan-400 hover:bg-cyan-300 text-blue-900 font-semibold py-3 px-6 rounded-xl transition shadow-lg">
                        Sign Up
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <p class="text-white/60 text-sm text-center mt-6">
                Already have an account?
                <a href="/Login" class="text-cyan-300 hover:underline">Login here</a>
            </p>
        </div>
    </section>
@endsection
