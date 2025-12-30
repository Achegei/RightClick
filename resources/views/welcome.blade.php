@extends('layouts.front')

@section('title', 'Land Your First Paying Client in 90 Days')

@section('content')
@php
use App\Models\Payment;

$user = auth()->user();
$freeRoadmapUrl = route('free-roadmap');
$proRoadmapUrl = route('roadmap.pro');
$premiumRoadmapUrl = route('roadmap.premium');
$checkoutProUrl = route('checkout.show', ['tier' => 'pro']);
$checkoutPremiumUrl = route('checkout.show', ['tier' => 'premium']);

// Determine CTA and redirect logic
$ctaUrl = route('pricing');
$ctaLabel = 'Yes, Show Me How!';

if($user) {
    // Check if user has Pro or Premium subscription
    $hasPro = Payment::where('user_id', $user->id)
        ->where('tier', 'pro')
        ->where('status', 'paid')
        ->where(function ($q) {
            $q->whereNull('subscription_expires_at')
              ->orWhere('subscription_expires_at', '>', now());
        })->exists();

    $hasPremium = Payment::where('user_id', $user->id)
        ->where('tier', 'premium')
        ->where('status', 'paid')
        ->where(function ($q) {
            $q->whereNull('subscription_expires_at')
              ->orWhere('subscription_expires_at', '>', now());
        })->exists();

    // Redirect to roadmap if already paid
    if($hasPro) {
        $ctaUrl = $proRoadmapUrl;
        $ctaLabel = 'Continue Pro Roadmap';
    } elseif($hasPremium) {
        $ctaUrl = $premiumRoadmapUrl;
        $ctaLabel = 'Continue Premium Roadmap';
    } else {
        // Not paid yet
        $ctaUrl = route('pricing');
        $ctaLabel = 'Upgrade to Premium to Access Roadmap';
    }
} else {
    // Guest sees Free CTA
    $ctaUrl = $freeRoadmapUrl;
    $ctaLabel = 'Start Free Roadmap';
}
@endphp

{{-- Hero Section --}}
<div class="relative bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 pt-28 overflow-hidden">
    <section class="relative max-w-7xl mx-auto px-6 py-24 lg:flex lg:items-center lg:justify-between">
        <div class="lg:w-1/2 text-center lg:text-left">
            <h1 class="text-5xl sm:text-6xl font-extrabold text-white mb-6 leading-tight animate-fade-in-down">
                Land Your First Paying Client in 90 Days
            </h1>
            <p class="text-white text-lg sm:text-xl mb-6 max-w-xl mx-auto lg:mx-0 animate-fade-in-down delay-50">
                Most beginners struggle for months without a single client. Join 500+ students who went from zero to paid projects with AI-assisted strategies.
            </p>
            <p class="text-white text-lg sm:text-xl mb-8 max-w-xl mx-auto lg:mx-0 animate-fade-in-down delay-100">
                Learn AI-assisted digital skills, position yourself professionally online, and start earning from freelance clients globally — from Kenya to North America and Europe.
            </p>
            <a href="{{ $ctaUrl }}" class="cta-button inline-block bg-white text-blue-600 font-semibold px-10 py-4 rounded-lg shadow-lg transform transition animate-fade-in-down delay-200">
                {{ $ctaLabel }}
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

    {{-- Paths/Tiers Overview --}}
    <section id="paths" class="grid md:grid-cols-3 gap-10 mb-20 text-center">
        <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <h3 class="font-semibold text-2xl mb-3">Free Starter Path</h3>
            <p class="text-gray-600 mb-2">7–14 days self-paced</p>
            <p class="text-gray-600 mb-4 font-semibold">Outcome: Clarity, Confidence & Next Step</p>
            <a href="{{ route('free-roadmap') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700">Start Free →</a>
        </div>
        <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <h3 class="font-semibold text-2xl mb-3">Pro Builder Path</h3>
            <p class="text-gray-600 mb-2">30–60 days guided</p>
            <p class="text-gray-600 mb-4 font-semibold">Outcome: Portfolio + First Client</p>
            <a href="{{ $hasPro ?? false ? $proRoadmapUrl : $checkoutProUrl }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700">
                {{ $hasPro ?? false ? 'Continue Pro →' : 'Upgrade to Pro →' }}
            </a>
        </div>
        <div class="bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2">
            <h3 class="font-semibold text-2xl mb-3">Premium Accelerator Path</h3>
            <p class="text-gray-600 mb-2">Mentorship & Mastery</p>
            <p class="text-gray-600 mb-4 font-semibold">Outcome: Rapid Progress + Personal Coaching</p>
            <a href="{{ $hasPremium ?? false ? $premiumRoadmapUrl : $checkoutPremiumUrl }}" class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700">
                {{ $hasPremium ?? false ? 'Continue Premium →' : 'Upgrade to Premium →' }}
            </a>
        </div>
    </section>

    {{-- Lessons Preview --}}
    <section id="lessons-preview" class="max-w-6xl mx-auto mb-20">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Sample Lessons from Free Starter Path</h2>
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2">Lesson 1: The Truth About Making Money Online</h3>
                <p class="text-gray-700 mb-2">Key Insight: Money follows value and visibility, not idle motivation.</p>
                <p class="text-gray-600 mb-2">Action: Write down your current beliefs about making money online, then compare them to reality.</p>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2">Lesson 2: Why Most Beginners Fail</h3>
                <p class="text-gray-700 mb-2">Key Insight: Chasing trends causes failure; confusion feels productive but yields nothing.</p>
                <p class="text-gray-600 mb-2">Action: List every online idea or course you’ve tried and see what derailed you.</p>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2">Lesson 3: Choose One Skill Path</h3>
                <p class="text-gray-700 mb-2">Key Insight: Focus wins. Concentration builds momentum.</p>
                <p class="text-gray-600 mb-2">Action: Commit to one skill path and write it down.</p>
            </div>
            <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="font-semibold text-xl mb-2">Lesson 4: AI Is a Tool, Not a Career</h3>
                <p class="text-gray-700 mb-2">Key Insight: AI amplifies clarity but cannot replace your unique value.</p>
                <p class="text-gray-600 mb-2">Action: Write one way to use AI to support your chosen skill.</p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section id="cta-pricing" class="text-center mb-20">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Want to Learn How to Make Money Online in 2026?</h2>
        <p class="text-gray-700 mb-6 max-w-2xl mx-auto">
            Discover actionable skills, AI-powered tools, and a 90-day roadmap that guides you from beginner to first paying client.
        </p>
        <a href="{{ $ctaUrl }}" class="cta-button inline-block bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold px-10 py-4 rounded-lg shadow-lg transition transform">
            {{ $ctaLabel }}
        </a>
    </section>
</div>

{{-- Floating Button --}}
<a href="{{ $ctaUrl }}" id="floatingEnrollBtn" class="fixed bottom-8 right-8 bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 transition transform scale-0">
    {{ $ctaLabel }}
</a>

{{-- Animations & Scripts --}}
<style>
    @keyframes fade-in-down {0% {opacity:0; transform:translateY(-20px);}100% {opacity:1; transform:translateY(0);}}
    @keyframes fade-in-up {0% {opacity:0; transform:translateY(20px);}100% {opacity:1; transform:translateY(0);}}
    @keyframes bounce-glow {0%,100%{transform:translateY(0); box-shadow:0 0 10px rgba(255,255,255,0.3);}50%{transform:translateY(-4px); box-shadow:0 0 20px rgba(255,255,255,0.6);}}
    .animate-fade-in-down {animation:fade-in-down 1s ease forwards;}
    .animate-fade-in-up {animation:fade-in-up 1s ease forwards;}
    .delay-50 {animation-delay:0.05s;}
    .delay-100 {animation-delay:0.1s;}
    .delay-200 {animation-delay:0.2s;}
    .cta-button:hover {animation:bounce-glow 0.6s ease-in-out infinite;}
    html{scroll-behavior:smooth;}
</style>

<script>
const btn=document.getElementById('floatingEnrollBtn');
window.addEventListener('scroll',()=>{if(window.scrollY>400){btn.classList.add('scale-100');btn.classList.remove('scale-0');}else{btn.classList.add('scale-0');btn.classList.remove('scale-100');}});
btn.addEventListener('mouseenter',()=>{btn.style.animation='bounce-glow 0.6s ease-in-out infinite';});
btn.addEventListener('mouseleave',()=>{btn.style.animation='';});
</script>
@endsection
