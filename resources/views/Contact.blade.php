@extends('Layout.Layout')

@section('title', 'Contact | Makhani Institute of Technology')
@section('meta_keywords', 'IT institute in Pakistan, Web Development, Graphic Designing, Mobile App Development, CIT, Digital Marketing, Makhani Institute')
@section('meta_description', 'Join Makhani Institute of Technology – Pakistan’s leading private tech institute offering expert-led courses in Web Development, CIT, Graphic Design, and more.')



@section('content')
    <section
        class="min-h-screen bg-gradient-to-br from-blue-800 via-indigo-800 to-blue-900 flex items-center justify-center px-4 py-16">
        <div class="bg-white/10 backdrop-blur-md p-8 md:p-10 rounded-3xl shadow-2xl w-full max-w-2xl border border-white/20">
            <h2 class="text-3xl font-bold text-white mb-6 text-center">Contact Us</h2>
            <p class="text-white/70 text-center mb-8 max-w-xl mx-auto">
                Have a question or need more information? We'd love to hear from you. Fill out the form and our team will
                get back to you shortly.
            </p>

            <form action="SendContact" method="POST" class="space-y-5">
                @csrf
                <!-- Name -->
                
                </h1>
                <div>
                    <label for="name" class="block text-white/80 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-white/80 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block text-white/80 mb-1">Subject</label>
                    <input type="text" id="subject" name="subject" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent">
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-white/80 mb-1">Message</label>
                    <textarea id="message" name="message" rows="5" required
                        class="w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/70 border border-white/20 focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent resize-none"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-4">
                    <button type="submit"
                        class="bg-cyan-400 hover:bg-cyan-300 text-blue-900 font-semibold py-3 px-6 rounded-xl transition shadow-lg">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
