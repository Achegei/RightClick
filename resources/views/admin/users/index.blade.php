@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Users</h1>
        <a href="{{ route('admin.users.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition">
            + Add User
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{-- Safe role display --}}
                        {{ $user->role?->name ?? 'No Role' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right flex justify-end gap-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
