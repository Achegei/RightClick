@extends('layouts.front')

@section('title', 'Wealth with SACCOs | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto pt-20 pb-16 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Next Level Africa Club Logo" class="mx-auto mb-4 w-24 h-24">

    <h1 class="text-5xl md:text-6xl font-extrabold text-cyan-300 mb-3">
        Wealth with SACCOs — Next Level Africa Club
    </h1>

    <p class="text-gray-300 max-w-3xl mx-auto mb-6">
        Build long-term wealth safely using SACCOs, disciplined savings, and strategic borrowing.
    </p>

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
        Get Started
    </a>

    {{-- Video --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/sacco-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Social Proof --}}
    <div class="mt-4 text-gray-300 text-lg">
        <span class="text-cyan-400 font-bold">{{ rand(20000, 45000) }}+</span>
        members are already growing wealth safely through SACCOs
    </div>
</section>

{{-- =========================
INTRODUCTION / SACCO COURSE
========================= --}}
<section class="max-w-6xl mx-auto pt-8 pb-20 px-6 text-center">

    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Grow Wealth the Smart & Safe Way
    </h2>

    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        SACCO Wealth Building for Everyday People
    </p>

    <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto mb-6">
        Wealth creation doesn’t have to be risky. This program teaches you how SACCOs work,
        how to maximize dividends, access affordable loans, and steadily build assets
        without gambling your future.
    </p>

    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        Designed for working professionals, entrepreneurs, and families seeking
        predictable, long-term financial growth through trusted cooperative systems.
    </p>

    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">Why SACCOs?</h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        SACCOs reward discipline, consistency, and patience. They offer high returns
        on savings, low-interest loans, and financial stability trusted by millions.
    </p>

    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">Requirements</h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-8">
        No large capital required — just commitment, consistency, and a long-term mindset.
    </p>

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Now
    </a>
</section>

{{-- =========================
SACCO WEALTH ROADMAP
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 text-center">
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        SACCO Wealth-Building Roadmap
    </h2>

    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        A Proven Path to Financial Stability
    </p>

    <p class="text-gray-300 text-lg md:text-xl max-w-4xl mx-auto mb-10">
        Learn how to select the right SACCOs, grow savings strategically,
        leverage affordable loans, and convert cooperative finance into assets.
    </p>

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Next Level Africa Club
    </a>
</section>

{{-- =========================
PERSONALIZED SACCO ROADMAP
========================= --}}
<section class="bg-gray-900 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">
            SACCO Wealth Framework
        </h2>
        <p class="text-gray-300 mb-6">
            Build Wealth Slowly, Safely, and Sustainably
        </p>
        <p class="text-gray-300 mb-6">
            Unlock the power of SACCOs: Master proven strategies to save effectively, leverage low-interest loans, and steadily grow your long-term wealth.
        </p>
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join Next Level Africa Club
        </a>
    </div>

    {{-- Steps with vertical cyan line --}}
    <div class="relative max-w-5xl mx-auto">
        <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-cyan-400"></div>

        <div class="space-y-16">

            {{-- Step 1 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">01</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">
                        Understanding SACCOs
                    </h3>
                    <p class="text-gray-300">
                        Learn how SACCOs operate, how member contributions generate dividends, and why disciplined SACCO participation can outperform traditional savings accounts.
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">
                        Smart Saving & Contribution Strategies
                    </h3>
                    <p class="text-gray-300">
                        Build consistent saving habits that maximize dividends and unlock higher borrowing capacity, while learning how to plan contributions without affecting your cash flow.
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">
                        Leveraging SACCO Loans
                    </h3>
                    <p class="text-gray-300">
                        Learn how to use low-interest SACCO loans responsibly to acquire income-generating assets like small businesses, rental properties, or diversified investments.
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">
                        Asset-Based Wealth Growth
                    </h3>
                    <p class="text-gray-300">
                        Turn SACCO financing into tangible assets such as land, rental units, or small enterprises, steadily increasing your wealth while minimizing risk.
                    </p>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">
                        Long-Term Wealth Security
                    </h3>
                    <p class="text-gray-300">
                        Safeguard your wealth through diversification, member benefits, and disciplined SACCO participation to achieve predictable, long-term financial growth.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- =========================
WHY CHOOSE OUR SACCO COURSE
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-12">

    {{-- Step-by-Step SACCO Learning --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2 text-left">
            <h2 class="text-3xl font-bold mb-4 text-gray-100">
                Step-by-Step SACCO Wealth Building
            </h2>
            <p class="text-gray-300 text-lg">
                Learn how SACCOs really work — from member contributions
                to dividends, loans, and long-term wealth growth.
                This course breaks everything down into simple, practical steps
                so you can confidently use SACCOs to grow wealth safely,
                consistently, and legally.
            </p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/sacco/roadmap.png') }}"
                 alt="SACCO Wealth Roadmap"
                 class="rounded-2xl shadow-lg w-full">
        </div>
    </div>

    {{-- Expert SACCO Guidance --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/sacco/expert.png') }}"
                 alt="SACCO Investment Expert"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Learn from Proven SACCO & Finance Experts
            </h3>
            <p class="text-gray-300">
                SACCOs are one of the safest wealth-building vehicles — when used correctly.
                You’ll learn from experts who understand SACCO structures,
                dividend strategies, loan leveraging, and risk management.
                No hype, no gambling — just smart, disciplined financial growth.
            </p>
        </div>
    </div>

    {{-- Practical Guidance & Support --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10 md:flex-row-reverse">
        <div class="md:w-1/2">
            <img src="{{ asset('images/sacco/support.png') }}"
                 alt="SACCO Support & Guidance"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Practical Guidance & Ongoing Support
            </h3>
            <p class="text-gray-300">
                Choosing the right SACCO, understanding bylaws,
                maximizing dividends, and using loans wisely
                can make or break your financial future.
                You’ll receive clear guidance and support to help you
                make smart decisions and avoid common SACCO mistakes.
            </p>
        </div>
    </div>

    {{-- SACCO Community --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/sacco/community.png') }}"
                 alt="SACCO Community"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Wealth-Focused SACCO Community
            </h3>
            <p class="text-gray-300">
                Build wealth alongside disciplined, like-minded individuals
                focused on long-term financial security.
                Share experiences, SACCO opportunities, and real-life lessons
                inside a supportive community designed for sustainable growth —
                not shortcuts.
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
            Trusted by thousands to build safe, long-term wealth through SACCOs
        </p>
    </div>

</section>

{{-- =========================
TESTIMONIALS
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-10">
    <h2 class="text-4xl font-extrabold text-center text-gray-100 mb-12">
        What Our Members Say
    </h2>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">
                “I finally understand how to use SACCO loans properly.
                I’ve acquired land and increased my savings consistently.”
            </p>
            <h4 class="text-gray-100 font-bold">Peter M., Kiambu</h4>
        </div>

        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">
                “This program changed my mindset about money.
                SACCOs are now my main wealth-building strategy.”
            </p>
            <h4 class="text-gray-100 font-bold">Grace W., Nairobi</h4>
        </div>
    </div>
</section>

{{-- =========================
GET ACCESS & PRICING
========================= --}}
<section class="max-w-7xl mx-auto py-20 px-6 text-center">

    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6">
        Get access for only KES 1,999
    </h2>

    <div class="mt-12 max-w-md mx-auto bg-gray-900 border border-cyan-400 rounded-3xl p-8 shadow-lg">
        <h3 class="text-2xl font-bold text-gray-100 mb-4">
            Take Action — Build Wealth Safely
        </h3>

        <div class="text-4xl font-extrabold text-cyan-400 mb-2">
            KES 1,999 <span class="text-gray-400 text-xl line-through ml-2">KES 10,499</span>
        </div>

        <ul class="space-y-2 text-left text-gray-300 mb-6">
            <li>✔ SACCO investment mastery</li>
            <li>✔ Asset-based wealth strategies</li>
            <li>✔ Access to expert mentors</li>
            <li>✔ Community support</li>
            <li>✔ Beginner-friendly</li>
            <li>✔ Lifetime access</li>
        </ul>

        <a href="{{ route('pricing') }}"
           class="block w-full bg-cyan-400 text-black font-bold py-4 rounded-xl hover:bg-cyan-500 transition">
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
                    Do I need money once inside Next Level Africa Club?
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
                No. Next Level Africa Club works globally.
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
