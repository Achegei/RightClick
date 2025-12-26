@extends('layouts.front')

@section('title', 'Land Your First Paying Client in 90 Days')

@section('content')
{{-- Hero Section --}}
<div class="relative bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 pt-28 overflow-hidden">
    <section class="relative max-w-7xl mx-auto px-6 py-24 lg:flex lg:items-center lg:justify-between">
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white mb-6 leading-tight animate-fade-in-down">
                Land Your First Paying Client in 90 Days
            </h1>
            <p class="text-white text-lg sm:text-xl mb-8 max-w-xl mx-auto lg:mx-0 animate-fade-in-down delay-100">
                Learn AI-assisted digital skills, position yourself professionally online, and start earning from freelance clients globally — from Kenya to North America and Europe.
            </p>
            <a href="{{ route('pricing') }}" class="cta-button inline-block bg-white text-blue-600 font-semibold px-10 py-4 rounded-lg shadow-lg transform transition animate-fade-in-down delay-200">
                Yes, Show Me How!
            </a>
        </div>

        <div class="lg:w-1/2 mt-12 lg:mt-0 flex justify-center lg:justify-end">
            <img src="{{ asset('images/hero-illustration.png') }}" alt="AI Freelance Illustration" class="w-full max-w-lg animate-fade-in-up">
        </div>
    </section>
</div>

<div class="max-w-7xl mx-auto px-6 py-20">
    {{-- Why This Works --}}
    <section id="why" class="grid md:grid-cols-3 gap-10 mb-20 text-center">
        <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <h3 class="font-semibold text-2xl mb-3">Real Skills</h3>
            <p class="text-gray-600 text-lg">AI-powered skills in demand on platforms like Upwork, Fiverr, and Freelancer.</p>
        </div>
        <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <h3 class="font-semibold text-2xl mb-3">Positioning</h3>
            <p class="text-gray-600 text-lg">Set up your profile, portfolio, and proposals to get noticed globally.</p>
        </div>
        <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <h3 class="font-semibold text-2xl mb-3">Actionable Roadmap</h3>
            <p class="text-gray-600 text-lg">Follow a 90-day structured path to first client acquisition and skill monetization.</p>
        </div>
    </section>

    {{-- CTA Section --}}
    <section id="cta-pricing" class="text-center mb-20">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Want to Learn How to Make Money Online in 2026?</h2>
        <p class="text-gray-700 mb-6 max-w-2xl mx-auto">
            Discover actionable skills, AI-powered tools, and a 90-day roadmap that guides you from beginner to first paying client.
            Whether you’re in Kenya, North America, or Europe, we’ll show you exactly how to get started.
        </p>
        <a href="{{ route('pricing') }}" class="cta-button inline-block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-10 py-4 rounded-lg shadow-lg transition transform">
            Yes, Show Me How!
        </a>
    </section>
</div>

{{-- Floating "Show Me How" Button --}}
<a href="{{ route('pricing') }}" id="floatingEnrollBtn" class="fixed bottom-8 right-8 bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 transition transform scale-0">
    Show Me How
</a>

{{-- Tailwind Animations & Micro-Animations --}}
<style>
    @keyframes fade-in-down {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes bounce-glow {
        0%, 100% { transform: translateY(0); box-shadow: 0 0 10px rgba(255,255,255,0.3); }
        50% { transform: translateY(-4px); box-shadow: 0 0 20px rgba(255,255,255,0.6); }
    }

    .animate-fade-in-down { animation: fade-in-down 1s ease forwards; }
    .animate-fade-in-up { animation: fade-in-up 1s ease forwards; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }

    /* Micro-animation on hover */
    .cta-button:hover {
        animation: bounce-glow 0.6s ease-in-out infinite;
    }

    html { scroll-behavior: smooth; }
</style>

<script>
    // Show floating button on scroll
    const btn = document.getElementById('floatingEnrollBtn');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 400) {
            btn.classList.add('scale-100');
            btn.classList.remove('scale-0');
        } else {
            btn.classList.add('scale-0');
            btn.classList.remove('scale-100');
        }
    });

    // Floating button micro-animation
    btn.addEventListener('mouseenter', () => {
        btn.style.animation = 'bounce-glow 0.6s ease-in-out infinite';
    });
    btn.addEventListener('mouseleave', () => {
        btn.style.animation = '';
    });
</script>
@endsection
