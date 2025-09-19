@extends('Layout.Layout')

@section('title', 'Update Student Profile | Makhani Institute of Technology')
@section('meta_keywords',
    'IT institute in Pakistan, Web Development, Graphic Designing, Mobile App Development, CIT,
    Digital Marketing, Makhani Institute')
@section('meta_description',
    'Update your student profile at Makhani Institute of Technology – change name, email,
    password, and profile image.')

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
    <section
        class="min-h-screen bg-gradient-to-br from-blue-800 via-indigo-800 to-blue-900 flex items-center justify-center px-4 py-12">
        <div class="bg-white/10 backdrop-blur-lg p-8 md:p-10 rounded-3xl shadow-2xl w-full max-w-lg border border-white/20">

            <!-- Heading -->
            <h2 class="text-3xl font-bold text-white mb-2 text-center">Update Your Profile</h2>
            <p class="text-white/70 text-center mb-6">Keep your information up-to-date</p>

            <!-- Profile Image Preview -->
            <div class="flex justify-center mb-6">
                <div class="relative">
                    @php
                        $user = session('user');
                        $profileImage =
                            $user && $user['StudentPicture']
                                ? asset('storage/' . $user['StudentPicture'])
                                : asset('images/default-profile.png'); // fallback image
                    @endphp

                    <img id="profilePreview" src="{{ $profileImage }}" alt="Profile Picture"
                        class="w-28 h-28 rounded-full object-cover border-4 border-cyan-400 shadow-lg">

                    <label for="StudentPicture"
                        class="absolute bottom-0 right-0 bg-cyan-400 text-blue-900 p-2 rounded-full cursor-pointer shadow hover:bg-cyan-300 transition">
                        <i class="fas fa-camera"></i>
                    </label>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('student.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label class="block text-white/80 mb-1" for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ $user['name'] ?? '' }}" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-white/80 mb-1" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user['email'] ?? '' }}" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-white/80 mb-1" for="password">New Password (optional)</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent"
                        placeholder="Leave blank to keep current password">
                </div>

                <!-- Profile Image Input -->
                <input type="file" name="StudentPicture" id="StudentPicture" class="hidden" accept="image/*">

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-cyan-400 hover:bg-cyan-300 text-blue-900 font-semibold py-3 px-6 rounded-xl transition shadow-lg">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Live Preview Script -->
    <script>
        document.getElementById('StudentPicture').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
@endsection
