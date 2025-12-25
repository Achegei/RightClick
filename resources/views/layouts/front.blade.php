<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', config('app.name'))</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

{{-- Navbar --}}
<nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">AI Freelance</a>

        {{-- Desktop Links --}}
        <div class="space-x-6 hidden md:flex items-center">
            <a href="{{ route('pricing') }}" class="text-gray-700 hover:text-blue-600 transition">Pricing</a>
            <a href="#why" class="text-gray-700 hover:text-blue-600 transition">Why This Works</a>
            <a href="#cta" class="text-gray-700 hover:text-blue-600 transition">Guarantee</a>

            @guest
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Register</a>
            @else
                <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition font-semibold">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            @endguest
        </div>

        {{-- Mobile Hamburger --}}
        <div class="md:hidden">
            <button id="mobileMenuBtn" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden md:hidden bg-white shadow-md">
        <a href="#tiers" class="block px-6 py-3 border-b text-gray-700 hover:text-blue-600 transition">Pricing</a>
        <a href="#why" class="block px-6 py-3 border-b text-gray-700 hover:text-blue-600 transition">Why This Works</a>
        <a href="#cta" class="block px-6 py-3 border-b text-gray-700 hover:text-blue-600 transition">Guarantee</a>

        @guest
            <a href="{{ route('register') }}" class="block px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 transition">Register</a>
        @else
            <a href="{{ route('dashboard') }}" class="block px-6 py-3 border-b text-gray-700 hover:text-blue-600 transition">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-6 py-3 text-white bg-red-600 hover:bg-red-700 transition">
                    Logout
                </button>
            </form>
        @endguest
    </div>
</nav>

{{-- Page Content --}}
<main class="container mx-auto px-4 pt-28 pb-6 min-h-screen">
    @yield('content')
</main>

{{-- Footer --}}
<footer class="bg-white shadow py-4 text-center text-gray-500">
    &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
</footer>

{{-- Mobile Menu Toggle Script --}}
<script>
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

</body>
</html>
