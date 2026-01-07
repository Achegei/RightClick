@extends('layouts.front')

@section('title', 'E-commerce Campus | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto py-28 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Next Level Africa Club Logo" class="mx-auto mb-6 w-24 h-24">
    <h1 class="text-5xl md:text-6xl font-extrabold text-gray-100 mb-4">
        E-commerce Campus — The  Club
    </h1>
    <p class="text-gray-400 max-w-3xl mx-auto mb-8">
        Access the strategies and talent that power the biggest e-commerce success stories and achieve your goals faster.
    </p>
    <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
        Get Started
    </a>

    {{-- Video Placeholder --}}
    <div class="mt-12 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/ecommerce-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Social Proof --}}
    <div class="mt-12 text-gray-300 text-lg">
        <span class="text-cyan-400 font-bold">{{ rand(35000, 50000) }}+</span> people have already changed their lives in Nairobi
    </div>
</section>

{{-- =========================
CHALLENGES / SERVICES SECTION
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 text-center">
    <h2 class="text-4xl font-extrabold text-gray-100 mb-12">
        We know that growing an ecommerce business is a daunting task
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-10 justify-items-center">
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/icons/research.png') }}" alt="Research" class="w-20 h-20 mb-4">
            <span class="text-lg font-medium text-cyan-300">Research</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/icons/branding.png') }}" alt="Branding" class="w-20 h-20 mb-4">
            <span class="text-lg font-medium text-cyan-300">Branding</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/icons/paid-traffic.png') }}" alt="Paid Traffic" class="w-20 h-20 mb-4">
            <span class="text-lg font-medium text-cyan-300">Paid Traffic</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/icons/organic-traffic.png') }}" alt="Organic Traffic" class="w-20 h-20 mb-4">
            <span class="text-lg font-medium text-cyan-300">Organic Traffic</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/icons/conversion-rate-optimization.png') }}" alt="Conversion Rate Optimization" class="w-20 h-20 mb-4">
            <span class="text-lg font-medium text-cyan-300">Conversion Rate Optimization</span>
        </div>
    </div>
</section>

{{-- =========================
PERSONALIZED ROADMAP SECTION
========================= --}}
<section class="bg-gray-900 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">Personalized Ecommerce Roadmap</h2>
        <p class="text-gray-400 mb-6">A Step-by-Step Guide to Success</p>
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join the Real World
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
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Niche Market & Niche Research</h3>
                    <p class="text-gray-300">
                        Start by pinpointing the industries or types of businesses you’re most interested in writing for. Specialize to increase your value.
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Million $$ Product</h3>
                    <p class="text-gray-300">
                        Find a winning product by mastering persuasive writing, SEO, and marketing trends.
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Branding</h3>
                    <p class="text-gray-300">
                        Build a strong portfolio showcasing blog posts, email campaigns, sales pages, and measurable results.
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Shopify Store Setup</h3>
                    <p class="text-gray-300">
                        Create a professional website, leverage social media, freelance platforms, and highlight your unique selling proposition.
                    </p>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Traffic: Paid & Organic</h3>
                    <p class="text-gray-300">
                        Deliver high-quality work, communicate effectively, and build long-term client relationships.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- =========================
WHY CHOOSE OUR COURSE
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-12">

    {{-- Master Ecommerce Success --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2 text-left">
            <h2 class="text-3xl font-bold mb-4 text-gray-100">Master Ecommerce Success: Transform Your Online Business</h2>
            <p class="text-gray-300 text-lg">
                Our course is your gateway to unlocking the secrets of successful ecommerce. With 11 in-depth categories, it's a structured roadmap for beginners and experienced entrepreneurs.
            </p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/roadmap.png') }}" alt="Ecommerce Roadmap" class="rounded-2xl shadow-lg w-full">
        </div>
    </div>

    {{-- Millionaire Professor --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/professor.png') }}" alt="Professor Andrew Bass" class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">Millionaire Professor: Learn from an Ecommerce Maestro</h3>
            <p class="text-gray-300">
                Imagine having a mentor who not only understands ecommerce but has also achieved seven-figure success. Professor Andrew Bass shares his wealth of knowledge to help you realize your financial dreams.
            </p>
        </div>
    </div>

    {{-- Daily Support & Coaching --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10 md:flex-row-reverse">
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/coaching.png') }}" alt="Daily Support & Coaching" class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">Daily Support and Coaching</h3>
            <p class="text-gray-300">
                Our team provides daily support and expert coaching to keep you motivated, enhance skills, and conquer the ecommerce world one step at a time.
            </p>
        </div>
    </div>

    {{-- Community --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/community.png') }}" alt="Community" class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">Community: Dive Deeper into Ecommerce</h3>
            <p class="text-gray-300">
                Daily insights, thought-provoking questions, and a supportive network to help you thrive in the ecommerce landscape.
            </p>
        </div>
    </div>

    <div class="text-center mt-12">
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join Next Level Africa Club
        </a>
        <p class="text-gray-400 mt-4">We've taught over 200,000+ students how to grow their income</p>
    </div>
</section>


{{-- =========================
TESTIMONIALS
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-10">
    <h2 class="text-4xl font-extrabold text-center text-gray-100 mb-12">What Our Students Say</h2>

    <div class="grid md:grid-cols-2 gap-8">
        {{-- Testimonial 1 --}}
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">"This course completely transformed my ecommerce business! I tripled my revenue in 3 months."</p>
            <h4 class="text-gray-100 font-bold">Jane K., Nairobi</h4>
        </div>
        {{-- Testimonial 2 --}}
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">"The strategies taught in Next Level Africa Club gave me the confidence to launch my online store successfully."</p>
            <h4 class="text-gray-100 font-bold">David M., Mombasa</h4>
        </div>
    </div>
</section>

{{-- =========================
GET ACCESS & PRICING
========================= --}}
<section class="max-w-7xl mx-auto py-20 px-6 text-center">

    {{-- Section Heading --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6">
        Get access to the best education platform for only KES 1,999
    </h2>

    {{-- Video --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/ecommerce-access.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Pricing Card --}}
    <div class="mt-12 max-w-md mx-auto bg-gray-900 border border-cyan-400 rounded-3xl p-8 shadow-lg">
        <h3 class="text-2xl font-bold text-gray-100 mb-4">Take Action: You need to act now.</h3>
        <div class="text-4xl font-extrabold text-cyan-400 mb-2">
            KES 1,999 <span class="text-gray-400 text-xl line-through ml-2">KES 10,499</span>
        </div>
        <div class="text-gray-300 mb-6">Forever</div>

        <ul class="space-y-2 text-left text-gray-300 mb-6">
            <li>✔ Simple step-by-step tutorials</li>
            <li>✔ 15 wealth creation methods</li>
            <li>✔ Access to millionaire mentors</li>
            <li>✔ Community chat groups</li>
            <li>✔ No experience needed</li>
            <li>✔ Custom-made learning</li>
            <li>✔ Cancel anytime</li>
            <li>✔ Risk-free</li>
        </ul>

        <a href="{{ route('pricing') }}" class="block w-full bg-cyan-400 text-black font-bold py-4 rounded-xl hover:bg-cyan-500 transition mb-2">
            Join Next Level Africa Club
        </a>
        <p class="text-xs text-gray-400 mt-2">Lock in the price before it increases. Act First.</p>
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
                Next Level Africa Club focuses on real skills, not shortcuts.
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
