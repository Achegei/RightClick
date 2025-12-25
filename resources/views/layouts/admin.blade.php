<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin') - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">

@php
    $hideSidebar = $hideSidebar ?? false;
@endphp

@if(auth()->check() && !$hideSidebar)
    <!-- Layout Wrapper -->
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r shadow-sm">
            <div class="p-6 text-xl font-bold text-indigo-600">
                Admin Panel
            </div>

            <nav class="space-y-1 px-3">
                @include('admin.partials.sidebar')
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">

            <!-- Top Navbar -->
            <header class="h-16 bg-white border-b flex items-center justify-between px-6 shadow-sm">
                <h1 class="text-lg font-semibold text-gray-800">
                    @yield('title')
                </h1>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="text-sm font-medium text-gray-600 hover:text-red-600">
                        Logout
                    </button>
                </form>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>
@else
    <!-- No Sidebar / No Navbar (Login, etc) -->
    @yield('content')
@endif

</body>
</html>
