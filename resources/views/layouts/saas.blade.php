<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Checkout') – {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- SEO --}}
    <meta name="description" content="@yield('description', 'Upgrade your plan')">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Optional subtle animations for Silicon Valley flair */
        .pulse-bg {
            animation: pulse 6s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.7; }
            50% { transform: scale(1.05); opacity: 0.5; }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 text-gray-900 font-[Inter] antialiased">

    {{-- Minimal SaaS Header --}}
    <header class="border-b bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="/" class="text-2xl font-bold tracking-tight text-indigo-700 hover:text-indigo-800 transition">
                {{ config('app.name') }}
            </a>
            <span class="text-sm text-gray-500">Secure Checkout</span>
        </div>
    </header>

    {{-- Optional floating decorative shapes --}}
    <div class="absolute top-0 left-0 w-72 h-72 bg-indigo-200 rounded-full opacity-20 pulse-bg mix-blend-multiply -z-10"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-pink-200 rounded-full opacity-20 pulse-bg mix-blend-multiply -z-10"></div>

    {{-- Page Content --}}
    <main class="min-h-screen flex flex-col justify-center">
        @yield('content')
    </main>

    {{-- Minimal Footer --}}
    <footer class="border-t text-sm text-gray-500 bg-white">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row justify-between items-center gap-2">
            <span>© {{ date('Y') }} {{ config('app.name') }}</span>
            <div class="flex gap-4">
                <a href="/privacy" class="hover:text-indigo-700 transition">Privacy</a>
                <a href="/terms" class="hover:text-indigo-700 transition">Terms</a>
            </div>
        </div>
    </footer>

</body>
</html>
