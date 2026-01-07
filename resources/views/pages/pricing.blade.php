@extends('layouts.front')

@section('title', 'Pricing')

@section('content')

{{-- =========================
CHOOSE YOUR PATH TO SUCCESS
========================= --}}
<section class="max-w-7xl mx-auto pt-20 pb-32 text-center">
    {{-- Heading --}}
    <h2 class="text-5xl font-extrabold text-gray-100 mb-6">
        Choose Your Path to Success
    </h2>

    <p class="text-gray-400 max-w-2xl mx-auto mb-14">
        This is not another course. This is an environment designed to produce winners.
    </p>

    {{-- Billing Toggle (Visual Only) --}}
    <div class="flex justify-center items-center gap-4 mb-20">
        <span class="text-gray-400 font-medium">Monthly</span>

        <label class="relative inline-flex cursor-pointer items-center">
            <input type="checkbox" class="sr-only peer">
            <div class="w-14 h-8 bg-gray-700 rounded-full peer-checked:bg-cyan-400 transition"></div>
            <div class="absolute left-1 top-1 w-6 h-6 bg-black rounded-full transition peer-checked:translate-x-6"></div>
        </label>

        <span class="text-gray-400 font-medium">
            Yearly <span class="text-cyan-400">(Save 17%)</span>
        </span>
    </div>

    {{-- Plans --}}
    <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">

        {{-- CONQUER PLAN --}}
        <div class="bg-gray-900 border border-gray-800 rounded-3xl p-10 shadow-xl hover:border-cyan-400 transition">

            <h3 class="text-3xl font-bold text-gray-100 mb-2">
                Conquer
            </h3>

            <p class="text-gray-400 mb-6">
                Start building income the right way
            </p>

            <div class="text-5xl font-extrabold text-cyan-400 mb-2">
                KES 1,999
            </div>

            <p class="text-gray-500 mb-10">
                per month
            </p>

            <ul class="space-y-4 text-left text-gray-300 mb-12">
                <li>✔ Simple step-by-step tutorials</li>
                <li>✔ 15 proven wealth creation methods</li>
                <li>✔ Access to millionaire mentors</li>
                <li>✔ Community chat groups</li>
                <li>✔ No experience required</li>
                <li>✔ Custom-made learning paths</li>
                <li>✔ Cancel anytime — risk free</li>
            </ul>

            <a href="{{ route('checkout.show', ['tier' => 'pro']) }}"
               class="block w-full bg-cyan-400 text-black font-bold py-4 rounded-xl hover:bg-cyan-500 transition">
                Join the Next Level Africa Club
            </a>

            <p class="text-xs text-gray-500 mt-4">
                Lock in the price before it increases. Act first.
            </p>
        </div>

        {{-- VANGUARD PLAN --}}
        <div class="relative bg-gray-900 border-2 border-pink-500 rounded-3xl p-10 shadow-2xl opacity-80">

            <span class="absolute top-4 right-4 bg-pink-500 text-black text-xs font-bold px-3 py-1 rounded-full">
                SOLD OUT
            </span>

            <h3 class="text-3xl font-bold text-gray-100 mb-2">
                Vanguard
            </h3>

            <p class="text-gray-400 mb-6">
                Next Level Africa Club access for advanced members
            </p>

            <div class="text-5xl font-extrabold text-pink-500 mb-2">
                KES 10,499
            </div>

            <p class="text-gray-500 mb-10">
                per month
            </p>

            <ul class="space-y-4 text-left text-gray-300 mb-12">
                <li>✔ Everything in Conquer</li>
                <li>✔ Direct mentorship access</li>
                <li>✔ Experimental business models</li>
                <li>✔ Priority releases & strategies</li>
            </ul>

            <button disabled
                class="block w-full bg-gray-700 text-gray-400 font-bold py-4 rounded-xl cursor-not-allowed">
                Sold Out
            </button>
        </div>

    </div>

    {{-- Social Proof --}}
    <div class="mt-24">
        <p class="text-gray-400 text-lg">
            Join <span class="text-cyan-400 font-bold">150,000+</span> members already inside theNext Level Africa Club
        </p>
    </div>

    <p class="text-xs text-gray-500 mt-6">
        *Prices shown in Kenyan Shillings
    </p>

</section>

@endsection
