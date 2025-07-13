@extends('Admin.Admin_Layout.AdminLayout')
@section('title', 'Media Content')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Media Content</h1>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-indigo-500 via-blue-500 to-cyan-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($MyImages as $index => $media)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $media->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($media->description, 100) }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $media->path) }}" alt="Media Image" class="w-24 h-16 object-cover rounded border shadow">
                        </td>
                        <td class="px-6 py-4">
                            <a 
                                href="{{ url('DeleteMedia/' . $media->id) }}" 
                                onclick="return confirm('Are you sure you want to delete this media?')"
                                class="inline-block px-4 py-2 text-sm text-white bg-red-500 hover:bg-red-600 rounded-lg shadow"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No media content available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
