@extends('layouts.front')

@section('title', 'Pricing')

@section('content')

{{-- Hero --}}
<section class="text-center max-w-4xl mx-auto mb-20">
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
        Simple pricing. Real outcomes.
    </h1>
    <p class="text-lg text-gray-600">
        Choose a path that matches where you are — and where you want to go in 2026.
    </p>
</section>

{{-- Tiers --}}
<section id="tiers" class="grid md:grid-cols-3 gap-8 mb-24">

    {{-- FREE --}}
    <div class="border rounded-3xl p-8 shadow-md hover:shadow-xl transition bg-white flex flex-col">
        <h3 class="text-2xl font-bold mb-2">Free</h3>
        <p class="text-gray-500 mb-6">
            Explore the online income landscape and reset your mindset.
        </p>

        <ul class="space-y-3 text-left text-gray-700 mb-8 flex-1">
            <li>✅ Free online income roadmap</li>
            <li>✅ Weekly newsletter (trends & opportunities)</li>
            <li>✅ How to set up Upwork, Fiverr & similar platforms</li>
            <li>✅ Best online businesses for 2026</li>
            <li>✅ Positioning yourself to earn online in 2026</li>
            <li>✅ Curated resources of people making money online</li>
        </ul>

        <a href="{{ route('free-roadmap') }}"
           class="block text-center bg-gray-900 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded-xl transition">
            Start Free
        </a>
    </div>

    {{-- PRO --}}
    <div class="border-2 border-blue-600 rounded-3xl p-8 shadow-xl bg-white flex flex-col relative">
        <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-sm font-semibold px-4 py-1 rounded-full">
            Most Popular
        </span>

        <h3 class="text-2xl font-bold mb-2">Pro</h3>
        <p class="text-gray-500 mb-1">KES 1,999</p>
        <p class="text-gray-600 mb-6">
            Get visibility, land your first client, and start earning within 90 days.
        </p>

        <ul class="space-y-3 text-left text-gray-700 mb-8 flex-1">
            <li>✅ Everything in Free</li>
            <li>🚀 90-day client acquisition guidance</li>
            <li>🚀 How to improve visibility on Fiverr & Upwork</li>
            <li>🚀 Profile optimization frameworks</li>
            <li>🚀 Proven methods to land your first paying client</li>
            <li>🚀 Well-researched 2026 online money-making gigs</li>
        </ul>

        <a href="{{ route('checkout', ['tier' => 'pro']) }}"
           class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition">
            Join Pro
        </a>
    </div>

    {{-- PREMIUM --}}
    <div class="border rounded-3xl p-8 shadow-md hover:shadow-xl transition bg-white flex flex-col">
        <h3 class="text-2xl font-bold mb-2">Premium</h3>
        <p class="text-gray-500 mb-1">KES 4,999</p>
        <p class="text-gray-600 mb-6">
            Personalized guidance and hands-on support to accelerate results.
        </p>

        <ul class="space-y-3 text-left text-gray-700 mb-8 flex-1">
            <li>✅ Everything in Free & Pro</li>
            <li>🔥 1-on-1 Zoom coaching calls</li>
            <li>🔥 Personalized online income strategy</li>
            <li>🔥 Profile audits & improvement sessions</li>
            <li>🔥 Direct guidance on monetization paths</li>
            <li>🔥 Priority support</li>
        </ul>

        <a href="{{ route('checkout', ['tier' => 'premium']) }}"
           class="block text-center bg-gray-900 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded-xl transition">
            Join Premium
        </a>
    </div>

</section>

{{-- Trust / Footer CTA --}}
<section class="text-center max-w-3xl mx-auto mb-10">
    <p class="text-gray-600">
        No hype. No shortcuts. Just clarity, skills, and execution for the online economy of 2026.
    </p>
</section>

@endsection
