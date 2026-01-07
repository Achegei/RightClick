<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Title --}}
    <title>@yield('seo_title', config('app.name'))</title>

    {{-- SEO Meta Description --}}
    <meta name="description" content="@yield('meta_description', config('app.name'))">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-950 font-sans antialiased text-gray-200">

{{-- Navbar --}}
<nav class="fixed top-0 left-0 w-full bg-black shadow-md z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        {{-- Logo + Site Name --}}
        <a href="{{ url('/') }}" class="flex items-center gap-3 text-xl font-bold text-cyan-400">
            <img src="{{ asset('images/logo.png') }}" alt="AI Freelance Logo" class="w-10 h-10">
            <span class="hidden md:inline">Next Level Africa</span>
            <span class="md:hidden">NLA</span>
        </a>

        {{-- Desktop Links --}}
        <div class="space-x-6 hidden md:flex items-center">
            <a href="#why" class="hover:text-cyan-400 transition">Features</a>
            <a href="#cta" class="hover:text-cyan-400 transition">Courses</a>
            <a href="{{ route('pricing') }}" class="hover:text-cyan-400 transition">Explore The Elite Club</a>

            @guest
            <div class="flex items-center gap-3">
                <!-- Login (secondary) -->
                <a href="{{ route('login') }}"
                   class="text-gray-200 hover:text-cyan-400 transition font-medium">
                    Login
                </a>

                <!-- Register (primary CTA) -->
                <a href="{{ route('pricing') }}"
                   class="bg-cyan-400 text-black px-4 py-2 rounded-lg hover:bg-cyan-500 transition font-semibold">
                    Join Now
                </a>
            </div>
            @else
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}"
                   class="text-gray-200 hover:text-cyan-400 transition font-medium">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="bg-magenta-500 text-black px-4 py-2 rounded-lg hover:bg-magenta-600 transition font-semibold">
                        Logout
                    </button>
                </form>
            </div>
            @endguest
        </div>

        {{-- Mobile Hamburger --}}
        <div class="md:hidden">
            <button id="mobileMenuBtn" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="hidden md:hidden bg-black shadow-md">
        <a href="#why" class="block px-6 py-3 border-b border-gray-800 hover:text-cyan-400 transition">Features</a>
        <a href="#cta" class="block px-6 py-3 border-b border-gray-800 hover:text-cyan-400 transition">Courses</a>
        <a href="#tiers" class="block px-6 py-3 border-b border-gray-800 hover:text-cyan-400 transition">Pricing</a>
        <a href="#cta" class="block px-6 py-3 border-b border-gray-800 hover:text-cyan-400 transition">Guarantee</a>

        @guest
        <div class="flex flex-col gap-2 p-4">
            <a href="{{ route('login') }}"
               class="block w-full text-center px-6 py-3 text-gray-200 bg-gray-800 hover:bg-gray-700 rounded-lg transition font-medium">
                Login
            </a>

            <a href="{{ route('pricing') }}"
               class="block w-full text-center px-6 py-3 text-black bg-cyan-400 hover:bg-cyan-500 rounded-lg transition font-semibold">
                Join Now
            </a>
        </div>
        @else
        <div class="flex flex-col gap-2 p-4">
            <a href="{{ route('dashboard') }}"
               class="block w-full text-center px-6 py-3 text-gray-200 bg-gray-800 hover:bg-gray-700 rounded-lg transition font-medium">
                Dashboard
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-center px-6 py-3 text-black bg-magenta-500 hover:bg-magenta-600 rounded-lg transition font-semibold">
                    Logout
                </button>
            </form>
        </div>
        @endguest
    </div>
</nav>

{{-- Page Content --}}
<main class="flex flex-col items-center justify-center container mx-auto px-4 pt-28 pb-6 min-h-screen">
    @yield('content')
</main>

{{-- ================= --}}
{{-- ELITE CLUB FOOTER --}}
{{-- ================= --}}
<footer class="bg-black border-t border-gray-300 pt-16 pb-10 text-gray-400">

    <div class="max-w-7xl mx-auto px-6">

        {{-- TOP GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">

            {{-- COURSES --}}
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">
                    Courses
                </h4>

                <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-sm">
                    <span>Crypto & Shares</span>
                    <span>Dropshipping</span>
                    <span>E-commerce</span>
                    <span>Stocks</span>
                    <span>MMFs & Bonds</span>
                    <span>Low-Capital Side Hustles</span>
                </div>
            </div>

            {{-- BRAND --}}
            <div>
                <h4 class="text-lg font-semibold text-cyan-400 mb-4">
                    The Elite Club
                </h4>

                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="#" class="hover:text-cyan-400 transition">
                            Newsletter
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-cyan-400 transition">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="mailto:support@eliteclub.com" class="hover:text-cyan-400 transition">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>

            {{-- QUICK LINKS --}}
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">
                    Access
                </h4>

                <ul class="space-y-2 text-sm">
                    <li>
                        <a href="{{ route('login') }}" class="hover:text-cyan-400 transition">
                            Login
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-cyan-400 transition">
                            Terms & Conditions
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-cyan-400 transition">
                            Privacy Policy
                        </a>
                    </li>
                    <li class="text-gray-500">
                        support@eliteclub.com
                    </li>
                </ul>
            </div>

        </div>

        {{-- SOCIALS --}}
        <div class="flex justify-center gap-6 mb-10 text-sm">
            <a href="#" class="hover:text-cyan-400 transition">Twitter</a>
            <a href="#" class="hover:text-cyan-400 transition">Facebook</a>
            <a href="#" class="hover:text-cyan-400 transition">Telegram</a>
            <a href="#" class="hover:text-cyan-400 transition">YouTube</a>
        </div>

        {{-- DISCLAIMER --}}
        <div class="max-w-4xl mx-auto text-center text-xs text-gray-300 leading-relaxed border-t border-gray-300 pt-6">
            Everything taught within the Elite Club is for educational purposes only.
            It is up to each member to implement and do the work.
            The Elite Club does not guarantee any profits or financial success.
        </div>

        {{-- COPYRIGHT --}}
        <div class="text-center text-xs text-gray-300 mt-6">
            © {{ date('Y') }} The Elite Club. All rights reserved.
        </div>

    </div>

</footer>


{{-- Mobile Menu Toggle --}}
<script>
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

</body>
</html>
