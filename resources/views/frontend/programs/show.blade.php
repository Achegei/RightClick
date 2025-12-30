@extends('layouts.front')

@section('title', $program->name)

@section('content')
<div class="container mx-auto px-4 py-12 max-w-5xl">

    {{-- Back to Programs --}}
    <div class="mb-6">
        <a href="{{ route('free-roadmap') }}"
           class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm inline-flex items-center">
            ← Back to Programs
        </a>
    </div>

    @php
        use App\Models\Payment;

        $user = auth()->user();

        $hasActiveSubscription = false;

        if ($user && $program->tier !== 'free') {
            $hasActiveSubscription = Payment::where('user_id', $user->id)
                ->where('tier', $program->tier)
                ->where('status', 'paid')
                ->where(function ($q) {
                    $q->whereNull('subscription_expires_at')
                      ->orWhere('subscription_expires_at', '>', now());
                })
                ->exists();
        }

        // Decide CTA
        if ($program->tier === 'free') {
            $ctaUrl = route('free-roadmap');
            $ctaLabel = 'Start Free Program';
        } elseif ($hasActiveSubscription) {
            $ctaUrl = $program->tier === 'pro'
                ? route('roadmap.pro')
                : route('roadmap.premium');

            $ctaLabel = 'Continue Program';
        } else {
            $ctaUrl = route('checkout.show', ['tier' => $program->tier]);
            $ctaLabel = 'Enroll Now';
        }
    @endphp

    {{-- Program Header --}}
    <div class="bg-white shadow-xl rounded-2xl p-8 mb-10 border border-gray-100">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-2">
            {{ $program->name }}
        </h1>

        <p class="text-gray-600 text-lg mb-4">
            {{ $program->description }}
        </p>

        {{-- Badges --}}
        <div class="flex items-center space-x-3 mb-6">
            <span class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">
                {{ ucfirst($program->tier) }} Tier
            </span>

            @if($program->duration_days)
                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">
                    Duration: {{ $program->duration_days }} days
                </span>
            @endif
        </div>

        {{-- Pricing + CTA --}}
        <div class="flex items-center space-x-6">
            <span class="text-gray-900 font-bold text-2xl">
                @if($program->price > 0)
                    ${{ number_format($program->price, 0) }}
                @else
                    Free
                @endif
            </span>

            <a href="{{ $ctaUrl }}"
               class="ml-auto bg-indigo-600 text-white font-semibold px-8 py-3 rounded-xl shadow-md hover:bg-indigo-700 transition">
                {{ $ctaLabel }}
            </a>
        </div>
    </div>

    {{-- What You'll Learn --}}
    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-2xl shadow border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-2">
                What You’ll Learn
            </h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li>Master the key concepts in {{ $program->name }}</li>
                <li>Hands-on exercises and real use cases</li>
                <li>Step-by-step execution roadmap</li>
            </ul>
        </div>

        {{-- Testimonial --}}
        <div class="bg-white p-6 rounded-2xl shadow border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-2">
                Student Success
            </h3>
            <p class="text-gray-700 italic">
                “This program completely changed how I approach real-world projects.”
            </p>
            <p class="text-gray-900 font-semibold mt-2">
                — Alex S., YC Founder
            </p>
        </div>
    </div>

</div>
@endsection
