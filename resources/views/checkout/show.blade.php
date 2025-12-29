@extends('layouts.saas')

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-indigo-600 via-purple-600 to-pink-500 py-16 px-6 relative overflow-hidden">

    <!-- Floating shapes -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-purple-400 rounded-full opacity-30 animate-pulse mix-blend-multiply"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-400 rounded-full opacity-20 animate-pulse mix-blend-multiply"></div>

    <div class="max-w-md mx-auto relative z-10">

        <!-- Header -->
        <div class="text-center mb-12 text-white">
            <h1 class="text-4xl font-extrabold mb-4">
                Subscribe to <span class="text-yellow-300">{{ $tierData->title }}</span>
            </h1>
            <p class="text-gray-200 text-base">
                Secure checkout via M-PESA. You’ll be redirected to complete payment.
            </p>
        </div>

        <!-- Card -->
        <div class="bg-white shadow-2xl rounded-3xl p-8 border border-gray-100">

            <!-- Price -->
            <div class="mb-8 text-center">
                <span class="text-gray-500 block">Amount</span>
                <span class="text-3xl font-bold text-gray-900">
                    KES {{ number_format($tierData->price) }}
                </span>
            </div>

            <!-- Pay Form -->
            <form method="POST" action="{{ route('checkout.pay', ['tier' => $tier]) }}">
                @csrf

                <button
                    type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition transform hover:-translate-y-0.5"
                >
                    Pay with M-PESA
                </button>
            </form>

            <!-- Note -->
            <p class="mt-6 text-center text-gray-400 text-xs">
                You will be redirected to IntaSend to complete payment.
                By continuing, you agree to our
                <a href="#" class="text-indigo-500 underline">Terms & Conditions</a>.
            </p>

        </div>
    </div>
</div>
@endsection
