@extends('Admin.Admin_Layout.AdminLayout')

@section('title', 'Contact Data')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-2xl shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold">Contact</h1>
        <p class="text-base mt-2">Manage and review Contact'here.</p>
    </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Subject</th>
                        <th class="px-4 py-2">Message</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($contacts as $contact)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $contact->id }}</td>
                            <td class="px-4 py-2">{{ $contact->name }}</td>
                            <td class="px-4 py-2">{{ $contact->email }}</td>
                            <td class="px-4 py-2">{{ $contact->subject }}</td>
                            <td class="px-4 py-2">{{ $contact->message }}</td>
                            <td class="px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ url('SendMail/' . $contact->id) }}"
                                        class="bg-green-500 text-white  p-1 rounded hover:bg-green-600 text-sm">
                                        Send Mail
                                    </a>
                                    <a href="{{ url('DeleteContact/' . $contact->id) }}"
                                        class="bg-red-500 text-white  p-1 rounded hover:bg-red-600 text-sm">
                                        Delete
                                    </a>
                                </div>
                            </td>



                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-2 text-center text-gray-500">No contact records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
