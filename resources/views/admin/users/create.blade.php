@extends('layouts.admin')

@section('title', 'Create User')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900">Create User</h1>
        <a href="{{ route('admin.users.index') }}" 
           class="text-blue-600 hover:underline">&larr; Back to Users</a>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter full name" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter email address" required>
            </div>

            <div class="mb-4">
                <label for="role_id" class="block text-gray-700 font-semibold mb-2">Role</label>
                <select name="role_id" id="role_id"
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Enter password" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Confirm password" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded transition">
                    Save User
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
