@extends('layouts.admin', ['hideSidebar' => true])

@section('title', 'Admin Login')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 to-purple-600">
    <div class="bg-white p-10 rounded-3xl shadow-2xl w-full max-w-sm">

        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/logo.png') }}" class="h-16" alt="Logo">
        </div>

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
            Admin Login
        </h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required
                       class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 border rounded-xl focus:ring-2 focus:ring-indigo-500">
            </div>

            <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-xl font-semibold transition">
                Login
            </button>
        </form>

        <p class="text-xs text-gray-500 mt-6 text-center">
            © {{ date('Y') }} Your Company
        </p>
    </div>
</div>
@endsection
