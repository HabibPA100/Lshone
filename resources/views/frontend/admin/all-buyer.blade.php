@extends('frontend.layouts.admin-layouts.admin-master')
@section('title', 'List of all buyer')
@section('content')
    <div class="overflow-x-auto p-4">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
            <tr>
                <th class="py-3 px-6 text-left">Full Name</th>
                <th class="py-3 px-6 text-left">Email</th>
                <th class="py-3 px-6 text-left">Phone</th>
                <th class="py-3 px-6 text-left">Address</th>
                <th class="py-3 px-6 text-left">Profile Image</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            @foreach ($buyers as $user)
                <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-6">{{ $user->full_name }}</td>
                <td class="py-3 px-6">{{ $user->email }}</td>
                <td class="py-3 px-6">{{ $user->phone }}</td>
                <td class="py-3 px-6">{{ $user->address }}</td>
                <td class="py-3 px-6">
                    <img src="{{ asset('storage/' . $user->profile_image) }}" class="w-10 h-10 rounded-full object-cover">
                </td>
                </tr>
            @endforeach

            <!-- More rows can go here -->
            </tbody>
        </table>
    </div>

@endsection