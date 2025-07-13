@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'Upload Image')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center text-blue-800 mb-6">Upload New Image</h1>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4 border border-green-200 shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4 border border-red-200 shadow">
            <ul class="list-disc ml-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Upload Form --}}
    <form action="UploadImageNow" method="POST" enctype="multipart/form-data" class="space-y-5 bg-white p-6 rounded-lg shadow-lg border border-blue-100">
        @csrf

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Title</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Image title">
        </div>

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Write a short description"></textarea>
        </div>

        <div>
            <label class="block font-semibold text-gray-700 mb-1">Choose Image</label>
            <input type="file" name="image" accept="image/png,image/jpg,image/jpeg,image/gif" class="w-full border border-gray-300 rounded px-3 py-2 file:mr-4 file:py-2 file:px-4 file:border-0 file:rounded-full file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-700 transition shadow">
            Upload Image
        </button>
    </form>
</div>
@endsection
