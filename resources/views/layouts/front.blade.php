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

{{-- Optional public navbar --}}

<main class="container mx-auto px-4 py-6 min-h-screen">
    @yield('content')
</main>

<footer class="bg-white shadow py-4 text-center text-gray-500">
    &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
</footer>

</body>
</html>
