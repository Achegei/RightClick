@extends('layouts.front')

@section('title', 'Crypto Campus | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto pt-20 pb-16 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Elite Club Logo" class="mx-auto mb-4 w-24 h-24">
    <h1 class="text-5xl md:text-6xl font-extrabold text-cyan-300 mb-3">
        Crypto Campus — Next Level Africa Club
    </h1>
    <p class="text-gray-300 max-w-3xl mx-auto mb-6">
        Learn how to profit from cryptocurrency markets using proven strategies from experienced crypto professionals.
    </p>
    <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
        Get Started
    </a>

    {{-- Video Placeholder --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/crypto-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Social Proof --}}
    <div class="mt-4 text-gray-300 text-lg">
        <span class="text-cyan-400 font-bold">{{ rand(35000, 50000) }}+</span>
        people have already changed their lives in Nairobi
    </div>
</section>

{{-- =========================
INTRODUCTION / CRYPTO COURSE
========================= --}}
<section class="max-w-6xl mx-auto pt-8 pb-20 px-6 text-center">

    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Master Cryptocurrency with Proven Market Strategies
    </h2>

    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        Designed for Beginners & Advanced Traders
    </p>

    <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto mb-6">
        Welcome to <strong>"The Real World Crypto Course"</strong> —
        a complete system designed to help you understand,
        trade, and invest in cryptocurrency markets with confidence.
    </p>

    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        This course delivers structured lessons, real-market analysis,
        and practical strategies to help you avoid costly mistakes,
        manage risk, and grow consistently in the crypto space.
    </p>

    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Why Crypto?
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        Cryptocurrency offers unmatched financial opportunity,
        borderless income, and the ability to participate in
        the fastest-growing financial ecosystem in the world.
    </p>

    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Requirements
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-8">
        No prior experience required. A small starting capital is enough
        to begin learning and applying the strategies taught.
    </p>

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Now
    </a>
</section>

{{-- =========================
TAILORED CRYPTO ROADMAP
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 text-center">

    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Tailored Crypto Trading Roadmap
    </h2>

    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        Your Step-by-Step Path to Crypto Success
    </p>

    <p class="text-gray-300 text-lg md:text-xl max-w-4xl mx-auto mb-10">
        Learn how to analyze crypto markets, identify profitable opportunities,
        manage volatility, and build long-term digital wealth with confidence.
    </p>

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Next Level Africa Club
    </a>
</section>

{{-- =========================
PERSONALIZED ROADMAP SECTION
========================= --}}
<section class="bg-gray-900 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">Crypto Market Foundations</h2>
        <p class="text-gray-300 mb-6">A Step-by-Step Guide to Digital Assets</p>
        <p class="text-gray-300 mb-6">
            Learn how cryptocurrencies work, how blockchain powers them,
            and how to profit responsibly in volatile markets.
        </p>
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join Next Level Africa Club
        </a>
    </div>

    <div class="relative max-w-5xl mx-auto">
        <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-cyan-400"></div>

        <div class="space-y-16">

            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">01</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Crypto Fundamentals</h3>
                    <p class="text-gray-300">
                        Understand blockchain, wallets, exchanges,
                        and how crypto markets operate globally.
                    </p>
                </div>
            </div>

            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Market Analysis</h3>
                    <p class="text-gray-300">
                        Learn technical and fundamental analysis
                        to identify high-probability trade setups.
                    </p>
                </div>
            </div>

            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Risk Management</h3>
                    <p class="text-gray-300">
                        Protect capital using position sizing,
                        stop-loss strategies, and discipline.
                    </p>
                </div>
            </div>

            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Advanced Strategies</h3>
                    <p class="text-gray-300">
                        Explore swing trading, trend trading,
                        and portfolio diversification techniques.
                    </p>
                </div>
            </div>

            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Long-Term Wealth</h3>
                    <p class="text-gray-300">
                        Build sustainable crypto wealth through
                        smart investing and market cycles.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- =========================
WHY CHOOSE OUR CRYPTO COURSE
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-12">

    {{-- Step-by-Step Learning --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2 text-left">
            <h2 class="text-3xl font-bold mb-4 text-gray-100">
                Step-by-Step Crypto Mastery
            </h2>
            <p class="text-gray-300 text-lg">
                Enter the world of cryptocurrency with clarity and confidence.
                This course is structured into clearly defined modules that take you
                from beginner fundamentals to advanced crypto strategies.
                Whether you are new to crypto or already trading, you’ll learn
                how to analyze markets, manage risk, and capitalize on real opportunities.
            </p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/crypto/roadmap.png') }}"
                 alt="Crypto Learning Roadmap"
                 class="rounded-2xl shadow-lg w-full">
        </div>
    </div>

    {{-- Expert Mentorship --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/crypto/mentor.png') }}"
                 alt="Crypto Mentor"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Learn from Proven Crypto Experts
            </h3>
            <p class="text-gray-300">
                Crypto is not about luck — it’s about understanding cycles, trends,
                and human psychology. You’ll be guided by experienced crypto traders
                who have navigated bull markets, bear markets, and volatility.
                Learn how professionals think, manage emotions, and protect capital
                while positioning for exponential upside.
            </p>
        </div>
    </div>

    {{-- Daily Support & Coaching --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10 md:flex-row-reverse">
        <div class="md:w-1/2">
            <img src="{{ asset('images/crypto/coaching.png') }}"
                 alt="Crypto Coaching"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Daily Guidance & Market Support
            </h3>
            <p class="text-gray-300">
                The crypto market moves fast — and mistakes are costly.
                That’s why you receive ongoing support, market insights,
                and strategic guidance to help you stay disciplined and focused.
                Ask questions, get clarity, and sharpen your execution
                with support designed to keep you profitable long-term.
            </p>
        </div>
    </div>

    {{-- Community --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/crypto/community.png') }}"
                 alt="Crypto Community"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Next Level Africa Club Crypto Community
            </h3>
            <p class="text-gray-300">
                You’re not learning alone. Inside the Next Level Africa Club Crypto Campus,
                you’ll connect with like-minded individuals focused on growth,
                discipline, and financial freedom.
                Share strategies, market insights, and experiences inside a community
                built to help everyone win together.
            </p>
        </div>
    </div>

    {{-- CTA --}}
    <div class="text-center mt-12">
        <a href="{{ route('pricing') }}"
           class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join Next Level Africa Club
        </a>
        <p class="text-gray-400 mt-4">
            Trusted by thousands of students worldwide to master crypto safely
        </p>
    </div>

</section>


{{-- =========================
GET ACCESS & PRICING
========================= --}}
<section class="max-w-7xl mx-auto py-20 px-6 text-center">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6">
        Get access to the best education platform for only KES 1,999
    </h2>

    <div class="mt-12 max-w-md mx-auto bg-gray-900 border border-cyan-400 rounded-3xl p-8 shadow-lg">
        <h3 class="text-2xl font-bold text-gray-100 mb-4">
            Take Action: You need to act now.
        </h3>

        <div class="text-4xl font-extrabold text-cyan-400 mb-2">
            KES 1,999 <span class="text-gray-400 text-xl line-through ml-2">KES 10,499</span>
        </div>

        <div class="text-gray-300 mb-6">Forever</div>

        <ul class="space-y-2 text-left text-gray-300 mb-6">
            <li>✔ Simple step-by-step tutorials</li>
            <li>✔ Crypto trading strategies</li>
            <li>✔ Access to expert mentors</li>
            <li>✔ Community chat groups</li>
            <li>✔ Beginner friendly</li>
            <li>✔ Risk management systems</li>
            <li>✔ Cancel anytime</li>
            <li>✔ Risk-free</li>
        </ul>

        <a href="{{ route('pricing') }}" class="block w-full bg-cyan-400 text-black font-bold py-4 rounded-xl hover:bg-cyan-500 transition">
            Join Next Level Africa Club
        </a>
    </div>
</section>
{{-- ========================= --}}
{{-- FREQUENTLY ASKED QUESTIONS --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl mb-32 mx-auto">

    <h2 class="text-3xl md:text-4xl font-extrabold text-white text-center mb-12">
        Frequently Asked Questions
    </h2>

    <div class="space-y-4 max-w-4xl mx-auto" id="faqAccordion">

        {{-- FAQ ITEM --}}
        <div class="faq-item bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                <span class="text-lg font-semibold text-cyan-400">
                    Is the program open for everyone?
                </span>
                <span class="faq-icon text-2xl text-white">+</span>
            </button>
            <div class="faq-answer hidden px-6 pb-6 text-gray-400">
                Yes. This program is designed for motivated individuals who are willing
                to learn, apply, and follow proven systems step by step.
            </div>
        </div>

        <div class="faq-item bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                <span class="text-lg font-semibold text-cyan-400">
                    How quickly will I make my money back?
                </span>
                <span class="faq-icon text-2xl text-white">+</span>
            </button>
            <div class="faq-answer hidden px-6 pb-6 text-gray-400">
                Results vary depending on effort, consistency, and execution.
                The Next Level Africa Club focuses on real skills, not shortcuts.
            </div>
        </div>

        <div class="faq-item bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                <span class="text-lg font-semibold text-cyan-400">
                    Do I need money once inside the Next Level Africa Club?
                </span>
                <span class="faq-icon text-2xl text-white">+</span>
            </button>
            <div class="faq-answer hidden px-6 pb-6 text-gray-400">
                No large capital is required. Many methods are beginner-friendly.
            </div>
        </div>

        <div class="faq-item bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                <span class="text-lg font-semibold text-cyan-400">
                    Does my age really matter?
                </span>
                <span class="faq-icon text-2xl text-white">+</span>
            </button>
            <div class="faq-answer hidden px-6 pb-6 text-gray-400">
                No. Commitment and consistency matter more than age.
            </div>
        </div>

        <div class="faq-item bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                <span class="text-lg font-semibold text-cyan-400">
                    I know nothing about the skills you teach. Is it a problem?
                </span>
                <span class="faq-icon text-2xl text-white">+</span>
            </button>
            <div class="faq-answer hidden px-6 pb-6 text-gray-400">
                Not at all. Everything is taught from the ground up.
            </div>
        </div>

        <div class="faq-item bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                <span class="text-lg font-semibold text-cyan-400">
                    I live in X country. Is it a problem?
                </span>
                <span class="faq-icon text-2xl text-white">+</span>
            </button>
            <div class="faq-answer hidden px-6 pb-6 text-gray-400">
                No. The Next Level Africa Club works globally.
            </div>
        </div>

        <div class="faq-item bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
            <button class="faq-question w-full flex justify-between items-center p-6 text-left">
                <span class="text-lg font-semibold text-cyan-400">
                    I don’t have a lot of time available. Can I still apply?
                </span>
                <span class="faq-icon text-2xl text-white">+</span>
            </button>
            <div class="faq-answer hidden px-6 pb-6 text-gray-400">
                Yes. Training is self-paced and flexible.
            </div>
        </div>

    </div>

    {{-- CTA Button --}}
    <div class="text-center mt-12">
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join Now
        </a>
    </div>
</section>

{{-- =========================
FAQ Accordion Script
========================= --}}
<script>
document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const faqItem = button.closest('.faq-item');
        const answer = faqItem.querySelector('.faq-answer');
        const icon = faqItem.querySelector('.faq-icon');

        const isOpen = !answer.classList.contains('hidden');

        // Close all others (accordion behavior)
        document.querySelectorAll('.faq-answer').forEach(a => a.classList.add('hidden'));
        document.querySelectorAll('.faq-icon').forEach(i => i.textContent = '+');

        // Toggle current
        if (!isOpen) {
            answer.classList.remove('hidden');
            icon.textContent = '−';
        }
    });
});
</script>

@endsection
