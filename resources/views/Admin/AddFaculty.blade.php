 @extends('Admin.Admin_Layout.AdminLayout')

 @section('title', 'Add Faculty')


 @section('content')

     <div class="max-w-4xl mx-auto px-6 py-10 bg-white rounded-2xl shadow-xl mt-10">
         <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">Add Faculties Details</h1>
        <p class="text-base mt-2">Manage and review Faculties'  here.</p>
    </div>

         <form action="CreateFaculty" method="POST" enctype="multipart/form-data" class="space-y-6">
             @csrf

             <!-- Profile Image -->
             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
                 <input type="file" name="profile_image" accept="image/*"
                     class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
             </div>

             <!-- Name -->
             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-1">Faculty Name</label>
                 <input type="text" name="name" placeholder="Enter full name"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                     required>
             </div>

             <!-- Education -->
             <!-- Education Dropdown -->
             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-1">Education</label>
                 <select name="education"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                     required>
                     <option value="" disabled selected>Select Education Level</option>
                     <option value="Matric">Matric / Secondary School</option>
                     <option value="Intermediate">Intermediate / Higher Secondary</option>
                     <option value="Diploma">Diploma</option>
                     <option value="Graduation">Bachelor’s Degree (Graduation)</option>
                     <option value="Masters">Master’s Degree</option>
                     <option value="MPhil">MPhil</option>
                     <option value="PhD">PhD / Doctorate</option>
                     <option value="PostDoc">Post Doctorate</option>
                     <option value="Other">Other</option>
                 </select>
             </div>


             <!-- Age -->
             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                 <input type="number" name="age" min="21" max="80" placeholder="Enter age"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                     required>
             </div>

             <!-- Technical Specialty -->
             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-1">Tech Specialty</label>
                 <input type="text" name="specialty" placeholder="e.g. Web Development, Networking"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                     required>
             </div>

             <!-- Assigned Course -->
             <div>
                 <label class="block text-sm font-medium text-gray-700 mb-1">Assigned Course</label>
                 <select name="course_id"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                     @foreach ($courses as $course)
                         <option value="{{ $course->id }}">{{ $course->name }}</option>
                     @endforeach
                 </select>

             </div>

             <!-- Submit Button -->
             <div class="text-center">
                 <button type="submit"
                     class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-xl shadow-md transition duration-300">
                     Save Faculty
                 </button>
             </div>
         </form>
     </div>


 @endsection
