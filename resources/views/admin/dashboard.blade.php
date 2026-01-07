@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('sidebar-title', 'Admin Panel')

@section('content')

{{-- ===================== --}}
{{-- OVERVIEW METRICS --}}
{{-- ===================== --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">Total Users</p>
        <h2 class="text-3xl font-extrabold">{{ number_format($totalUsers) }}</h2>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">Free Users</p>
        <h2 class="text-3xl font-extrabold text-blue-600">
            {{ number_format($freeUsers) }}
        </h2>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">Total Revenue</p>
        <h2 class="text-3xl font-extrabold text-green-600">
            KES {{ number_format($totalRevenue) }}
        </h2>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">Revenue This Month</p>
        <h2 class="text-3xl font-extrabold text-indigo-600">
            KES {{ number_format($monthlyRevenue) }}
        </h2>
    </div>

</div>

{{-- ===================== --}}
{{-- TIER BREAKDOWN --}}
{{-- ===================== --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-{{ $tiers->count() }} gap-6 mb-10">

@foreach($tiers as $tier)
    <div class="bg-white rounded-xl shadow p-6">
        <p class="text-sm text-gray-500">{{ $tier->title }} Users</p>

        <h2 class="text-3xl font-extrabold text-purple-600">
            {{ number_format($usersPerTier[$tier->slug] ?? 0) }}
        </h2>

        <p class="text-sm text-gray-500 mt-2">
            Revenue:
            <span class="font-semibold text-green-600">
                KES {{ number_format($revenueByTier[$tier->slug] ?? 0) }}
            </span>
        </p>
    </div>
@endforeach

</div>

{{-- ===================== --}}
{{-- BLOG ANALYTICS --}}
{{-- ===================== --}}
<div class="bg-white rounded-2xl shadow p-8 mb-12">

    <h2 class="text-2xl font-extrabold text-gray-900 mb-6">
        Blog Analytics
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        {{-- Total Blogs --}}
        <div class="rounded-xl border p-6">
            <p class="text-sm text-gray-500">Total Blogs</p>
            <h3 class="text-3xl font-extrabold text-indigo-600">
                {{ $totalBlogs }}
            </h3>
        </div>

        {{-- Total Views --}}
        <div class="rounded-xl border p-6">
            <p class="text-sm text-gray-500">Total Blog Views</p>
            <h3 class="text-3xl font-extrabold text-green-600">
                {{ number_format($totalBlogViews) }}
            </h3>
        </div>

        {{-- Engagement --}}
        <div class="rounded-xl border p-6">
            <p class="text-sm text-gray-500">Avg Views / Blog</p>
            <h3 class="text-3xl font-extrabold text-purple-600">
                {{ $totalBlogs > 0 ? round($totalBlogViews / $totalBlogs) : 0 }}
            </h3>
        </div>
    </div>

    {{-- Top Blogs --}}
    <h3 class="text-lg font-bold text-gray-900 mb-4">
        Top Blogs
    </h3>

    <div class="space-y-4">
        @foreach($topBlogs as $blog)
            <div class="flex items-center justify-between p-4 rounded-xl border hover:bg-gray-50">
                <span class="font-medium text-gray-800">
                    {{ $blog->title }}
                </span>
                <span class="text-sm text-gray-500">
                    {{ $blog->views }} views
                </span>
            </div>
        @endforeach
    </div>
</div>


{{-- ===================== --}}
{{-- USERS & REVENUE BY TIER --}}
{{-- ===================== --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">

@foreach($tiers as $tier)
    <div class="bg-white rounded-2xl shadow p-6">
        <p class="text-sm text-gray-500">
            {{ $tier->title }} Users
        </p>

        <h2 class="text-3xl font-extrabold text-blue-600">
            {{ $usersPerTier[$tier->slug] ?? 0 }}
        </h2>

        <p class="text-sm text-gray-500 mt-2">
            Revenue:
            <span class="font-semibold text-green-600">
                KES {{ number_format($revenueByTier[$tier->slug] ?? 0) }}
            </span>
        </p>
    </div>
@endforeach

</div>

{{-- ===================== --}}
{{-- QUICK ACTIONS --}}
{{-- ===================== --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <a href="{{ route('admin.programs.index') }}" class="bg-white shadow rounded-xl p-6">
        <h2 class="font-bold">Programs</h2>
        <p class="text-gray-600">Manage all programs</p>
    </a>

    <a href="{{ route('admin.courses.index') }}" class="bg-white shadow rounded-xl p-6">
        <h2 class="font-bold">Courses</h2>
        <p class="text-gray-600">Manage all courses</p>
    </a>

    <a href="{{ route('admin.users.index') }}" class="bg-white shadow rounded-xl p-6">
        <h2 class="font-bold">Users</h2>
        <p class="text-gray-600">Manage all users</p>
    </a>
</div>

{{-- ===================== --}}
{{-- CHART DATA --}}
{{-- ===================== --}}
<script>
    window.dashboardCharts = {
        usersByTier: @json($chartUsersByTier),
        revenueByTier: @json($chartRevenueByTier)
    };
</script>

@endsection
