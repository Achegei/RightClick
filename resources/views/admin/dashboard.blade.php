@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('sidebar-title', 'Admin Panel')

@section('sidebar-links')
    <a href="{{ route('admin.dashboard') }}" 
       class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-600' : 'text-gray-700' }}">
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.programs.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 font-medium {{ request()->routeIs('admin.programs.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700' }}">
        Programs
    </a>

    <a href="{{ route('admin.courses.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 font-medium {{ request()->routeIs('admin.courses.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700' }}">
        Courses
    </a>

    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-2 px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 font-medium {{ request()->routeIs('admin.users.*') ? 'bg-blue-100 text-blue-600' : 'text-gray-700' }}">
        Users
    </a>
@endsection

@section('navbar-actions')
    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
        @csrf
        <button type="submit" class="text-gray-700 hover:text-blue-600 font-medium">Logout</button>
    </form>
@endsection

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <a href="{{ route('admin.programs.index') }}" class="bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition hover:scale-[1.02]">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Programs</h2>
        <p class="text-gray-600">Manage all programs</p>
    </a>
    <a href="{{ route('admin.courses.index') }}" class="bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition hover:scale-[1.02]">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Courses</h2>
        <p class="text-gray-600">Manage all courses</p>
    </a>
    <a href="{{ route('admin.users.index') }}" class="bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition hover:scale-[1.02]">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Users</h2>
        <p class="text-gray-600">Manage all users</p>
    </a>
</div>
@endsection
