@extends('layouts.front')

@section('title', 'Pricing')

@section('content')

{{-- =========================
    HERO
========================= --}}
<section class="text-center max-w-4xl mx-auto mb-20 px-6">
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
        Simple pricing. Real outcomes.
    </h1>
    <p class="text-lg text-gray-600">
        Choose how fast you want to go — start free, or accelerate with guided execution.
    </p>
</section>

{{-- =========================
    DYNAMIC USER DASHBOARD
========================= --}}
@if(Auth::check() && $userProgram = $programs->firstWhere('tier', Auth::user()->tier))
<div class="max-w-7xl mx-auto px-6 py-12 mb-20 rounded-2xl shadow-xl overflow-hidden bg-gradient-to-r from-purple-50 via-white to-blue-50 transition hover:scale-105">
    
    {{-- Program Header --}}
    <div class="p-8 flex flex-col md:flex-row md:justify-between md:items-center bg-white rounded-xl">
        <h2 class="text-3xl font-bold text-gray-900">{{ $userProgram->name }}</h2>
        <span class="mt-2 md:mt-0 text-gray-500">{{ $userProgram->duration_days ?? '90' }} Days</span>
        <span class="px-3 py-1 rounded-full font-medium
            @if(Auth::user()->tier == 'free') bg-gray-200 text-gray-800
            @elseif(Auth::user()->tier == 'pro') bg-blue-200 text-blue-800
            @elseif(Auth::user()->tier == 'premium') bg-purple-200 text-purple-800
            @endif
        ">
            {{ ucfirst(Auth::user()->tier) }} Tier
        </span>
    </div>

    {{-- Animated Progress --}}
    @php
        $totalLessons = $userProgram->courses->sum(fn($c) => $c->lessons->count());
        $completedLessons = $userProgram->courses->sum(fn($c) => $c->lessons->filter(fn($l) => $l->pivot->completed ?? false)->count());
        $progressPercent = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100) : 0;
    @endphp
    <div class="flex justify-center my-8">
        <div class="relative w-40 h-40">
            <svg class="w-40 h-40 transform -rotate-90">
                <circle cx="80" cy="80" r="70" stroke="#e5e7eb" stroke-width="20" fill="none"></circle>
                <circle cx="80" cy="80" r="70" stroke="url(#gradient)" stroke-width="20" fill="none"
                    stroke-dasharray="{{ 2 * pi() * 70 }}"
                    stroke-dashoffset="{{ 2 * pi() * 70 * (1 - $progressPercent/100) }}"
                    stroke-linecap="round"
                    style="transition: stroke-dashoffset 1s ease"></circle>
                <defs>
                    <linearGradient id="gradient" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#6366f1"/>
                        <stop offset="100%" stop-color="#3b82f6"/>
                    </linearGradient>
                </defs>
            </svg>
            <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-3xl font-bold text-gray-800">{{ $progressPercent }}%</span>
            </div>
        </div>
    </div>

    {{-- Courses --}}
    <div class="grid md:grid-cols-2 gap-8 p-8">
        @foreach($userProgram->courses as $course)
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-1">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $course->title }}</h3>
            <p class="text-gray-500 mb-4">{{ $course->description }}</p>

            <ul class="space-y-2">
                @foreach($course->lessons as $lesson)
                @php $isCompleted = $lesson->pivot->completed ?? false; @endphp
                <li class="flex items-center justify-between p-2 rounded-lg bg-gradient-to-r {{ $isCompleted ? 'from-green-100 to-green-200' : 'from-gray-50 to-white' }} shadow-sm hover:shadow-md transition">
                    <div class="flex items-center space-x-3">
                        <input type="checkbox" class="lesson-complete w-5 h-5 accent-indigo-500" data-lesson-id="{{ $lesson->id }}" {{ $isCompleted ? 'checked' : '' }}>
                        <span class="{{ $isCompleted ? 'line-through text-gray-400 font-medium' : 'text-gray-800 font-medium' }}">{{ $lesson->title }}</span>
                    </div>
                    @if($isCompleted)
                    <span class="text-green-600 font-bold text-lg">✔</span>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div>

<script>
document.querySelectorAll('.lesson-complete').forEach(cb => {
    cb.addEventListener('change', async (e) => {
        const lessonId = e.target.dataset.lessonId;
        const completed = e.target.checked;

        const res = await fetch(`/lessons/${lessonId}/complete`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ completed })
        });

        if(res.ok){
            location.reload();
        }
    });
});
</script>
@endif

{{-- =========================
    TIERS
========================= --}}
<section id="tiers" class="grid md:grid-cols-3 gap-8 mb-24 px-6">

    {{-- FREE --}}
    <div class="border rounded-3xl p-8 shadow-md hover:shadow-xl transition bg-white flex flex-col">
        <span class="inline-block mb-3 text-sm font-semibold text-blue-600 uppercase tracking-wide">
            Free — Exploration Mode
        </span>

        <h3 class="text-2xl font-bold mb-2">Start Free</h3>
        <p class="text-gray-500 mb-6">
            Best for absolute beginners who want clarity before committing. No pressure. No hype.
        </p>

        <ul class="space-y-3 text-left text-gray-700 mb-8 flex-1">
            <li>✅ Weekly curated newsletter (real opportunities, not hype)</li>
            <li>✅ How Upwork, Fiverr & online gigs actually work</li>
            <li>✅ Best online business models for 2026</li>
            <li>✅ How people really make money online (examples & case studies)</li>
            <li>✅ Positioning yourself to earn online in 2026</li>
            <li>✅ Best business ideas to start in 2026</li>
        </ul>

        <a href="{{ Auth::check() ? route('free-roadmap') : route('register') }}"
            class="block text-center bg-gray-900 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded-xl transition">
                Start Free
        </a>


        <p class="mt-4 text-sm text-gray-400 text-center">
            No credit card required
        </p>
    </div>

    {{-- PRO --}}
    <div class="border-2 border-blue-600 rounded-3xl p-8 shadow-xl bg-white flex flex-col relative hover:shadow-2xl transition">
        <span class="absolute -top-4 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-sm font-semibold px-4 py-1 rounded-full">
            Most Popular
        </span>

        <h3 class="text-2xl font-bold mb-1">Pro — Execution Mode</h3>
        <p class="text-gray-500 mb-1">KES 1,999</p>
        <p class="text-gray-600 mb-6">
            Built for people ready to act. Move from skill → visibility → first client in 90 days.
        </p>

        <ul class="space-y-3 text-left text-gray-700 mb-8 flex-1">
            <li>✅ Everything in Free</li>
            <li>🚀 90-day Skill → Client roadmap</li>
            <li>🚀 Profile optimization for Upwork, Fiverr & similar platforms</li>
            <li>🚀 Visibility strategies to get noticed (no paid ads)</li>
            <li>🚀 Portfolio & proposal frameworks (even from zero)</li>
            <li>🚀 Well-researched 2026 online money-making gigs</li>
            <li>🚀 How to land your first paying client within 90 days</li>
        </ul>

        <a href="{{ route('checkout.show', ['tier' => 'pro']) }}" 
        class="block text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition">
            Join Pro
        </a>

        <p class="text-xs text-gray-400 text-center mt-3">
            One-time payment • Lifetime access • Beginner-friendly
        </p>
    </div>

    {{-- PREMIUM --}}
    <div class="border rounded-3xl p-8 shadow-md hover:shadow-xl transition bg-white flex flex-col">
        <h3 class="text-2xl font-bold mb-1">Premium — Acceleration Mode</h3>
        <p class="text-gray-500 mb-1">KES 4,999</p>
        <p class="text-gray-600 mb-6">
            For serious earners who want clarity, speed, and direct guidance — without trial and error.
        </p>

        <ul class="space-y-3 text-left text-gray-700 mb-8 flex-1">
            <li>✅ Everything in Free & Pro</li>
            <li>🔥 1-on-1 Zoom calls (personal guidance)</li>
            <li>🔥 Profile audits with clear, actionable feedback</li>
            <li>🔥 Personalized niche & positioning advice</li>
            <li>🔥 Direct accountability & faster corrections</li>
            <li>🔥 Priority support</li>
        </ul>

        <a href="{{ route('checkout.show', ['tier' => 'premium']) }}" 
        class="block text-center bg-gray-900 hover:bg-gray-800 text-white font-semibold px-6 py-3 rounded-xl transition">
            Go Premium
        </a>

        <p class="text-xs text-gray-400 text-center mt-3">
            Limited spots • High-touch support • One-time payment
        </p>
    </div>
</section>

{{-- =========================
    PRICE COMPARISON TABLE
========================= --}}
<section class="max-w-5xl mx-auto px-6 mb-24">
    <h2 class="text-3xl font-extrabold text-center mb-3">
        Compare plans at a glance
    </h2>
    <p class="text-center text-gray-600 mb-10">
        Clear features. No surprises.
    </p>

    <div class="overflow-x-auto">
        <table class="w-full border-separate border-spacing-0 rounded-2xl overflow-hidden shadow-sm">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left px-6 py-4 text-gray-600 font-medium">Feature</th>
                    <th class="px-6 py-4 text-center text-gray-500 font-medium">Free</th>
                    <th class="px-6 py-4 text-center font-semibold text-blue-600 bg-blue-50 ring-2 ring-blue-200">
                        Pro
                    </th>
                    <th class="px-6 py-4 text-center text-gray-500 font-medium">Premium</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 bg-white">
                @php
                    $features = [
                        ['Newsletter & curated resources', true, true, true],
                        ['Online business education', true, true, true],
                        ['2026 gig research', false, true, true],
                        ['90-day execution roadmap', false, true, true],
                        ['Profile optimization (Upwork, Fiverr)', false, true, true],
                        ['Client acquisition guidance', false, true, true],
                        ['1-on-1 Zoom coaching', false, false, true],
                        ['Priority support', false, false, true],
                    ];
                @endphp
                @foreach($features as [$feature, $free, $pro, $premium])
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-700">{{ $feature }}</td>
                        <td class="text-center text-gray-400">{{ $free ? '✓' : '—' }}</td>
                        <td class="text-center bg-blue-50 font-medium text-blue-600">{{ $pro ? '✓' : '—' }}</td>
                        <td class="text-center text-gray-600">{{ $premium ? '✓' : '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pro Recommendation --}}
    <div class="flex justify-center mt-6">
        <span class="inline-flex items-center gap-2 bg-blue-50 text-blue-600 text-sm font-medium px-5 py-2 rounded-full">
            ⭐ Pro is the best starting point for most users
        </span>
    </div>
</section>

{{-- =========================
    WHY THIS WORKS
========================= --}}
<section id="why" class="max-w-5xl mx-auto px-6 mb-24">
    <h2 class="text-3xl font-extrabold text-center mb-6">
        Why this system works (when most don’t)
    </h2>
    <p class="text-center text-gray-600 mb-12">
        Most people fail online because they follow hype, not systems. Here's why our approach works.
    </p>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
            $reasons = [
                ['🚫 No Fake Income Promises', 'We don’t sell dreams. We teach skills, positioning, and visibility.'],
                ['🧭 Clear Roadmap', 'Most people fail because they don’t know what to do next. We remove that confusion.'],
                ['🧠 Skills + Positioning', 'Skill alone doesn’t pay. Positioning + visibility does.'],
                ['🌍 Global Market Focus', 'You don’t compete locally. You sell globally — from Kenya to the world.'],
                ['🔁 Execution Over Consumption', 'This isn’t another course to watch. It’s a system to implement.'],
            ];
        @endphp
        @foreach($reasons as [$title, $text])
            <div class="bg-white shadow-md p-6 rounded-2xl hover:shadow-xl transition flex flex-col">
                <h3 class="text-xl font-semibold mb-2">{{ $title }}</h3>
                <p class="text-gray-600 flex-1">{{ $text }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- =========================
    MONEY-BACK GUARANTEE
========================= --}}
<section id="guarantee" class="bg-blue-50 py-16">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-extrabold text-gray-900 mb-4">
            Fair. Honest. No hype guarantee.
        </h2>
        <p class="text-gray-700 mb-8">
            If you complete the roadmap, implement the assignments, and gain no measurable benefit — skills, clarity, or traction — we’ll refund you.
        </p>
        <ul class="space-y-2 text-left inline-block text-gray-700 text-lg mb-4">
            <li>✔ No income promises</li>
            <li>✔ No pressure</li>
            <li>✔ Just accountability</li>
        </ul>
        <a href="#tiers" class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-10 py-4 rounded-lg shadow-lg transition">
            Start Learning Today
        </a>
    </div>
</section>

{{-- =========================
    WHO THIS IS NOT FOR
========================= --}}
<section class="max-w-5xl mx-auto px-6 mb-24">
    <h2 class="text-3xl font-extrabold text-center mb-6">
        Who This Is (and Isn’t) For
    </h2>
    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white shadow-md p-6 rounded-2xl">
            <h3 class="text-xl font-semibold text-red-600 mb-3">❌ This is NOT for:</h3>
            <ul class="list-disc list-inside text-gray-600 space-y-1">
                <li>People looking for overnight money</li>
                <li>Anyone unwilling to learn or apply</li>
                <li>Those who want passive income without effort</li>
            </ul>
        </div>
        <div class="bg-white shadow-md p-6 rounded-2xl">
            <h3 class="text-xl font-semibold text-green-600 mb-3">✅ This IS for:</h3>
            <ul class="list-disc list-inside text-gray-600 space-y-1">
                <li>Beginners who want direction</li>
                <li>Freelancers tired of guessing</li>
                <li>People serious about earning online long-term</li>
            </ul>
        </div>
    </div>
</section>

{{-- =========================
    FOOTER CTA / TRUST
========================= --}}
<section class="text-center max-w-3xl mx-auto mb-10 px-6">
    <p class="text-gray-600">
        No hype. No shortcuts. Just clarity, skills, and execution for the online economy of 2026.
    </p>
</section>

@endsection
