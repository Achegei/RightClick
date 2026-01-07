@extends('layouts.front')

@section('title', 'Low-Capital Side Hustles | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto pt-20 pb-16 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Next Level Africa Club Logo" class="mx-auto mb-4 w-24 h-24">
    <h1 class="text-5xl md:text-6xl font-extrabold text-cyan-300 mb-3">
        Low-Capital Side Hustles
    </h1>
    <p class="text-gray-300 max-w-3xl mx-auto mb-6">
        Start profitable ventures with little money and scale fast.
    </p>
    <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
        Start Your Side Hustle Today
    </a>

    {{-- Video Placeholder --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/side-hustle-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Social Proof --}}
    <div class="mt-4 text-gray-300 text-lg">
        <span class="text-cyan-400 font-bold">{{ rand(5000, 15000) }}+</span> people have already started profitable side hustles
    </div>
</section>

{{-- =========================
INTRODUCTION / SIDE HUSTLE COURSE
========================= --}}
<section class="max-w-6xl mx-auto pt-8 pb-20 px-6 text-center">

    {{-- Main Heading --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Launch Your First Low-Capital Business
    </h2>

    {{-- Subheading --}}
    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        Step-by-Step Guidance for Beginners
    </p>

    {{-- Intro Paragraph --}}
    <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto mb-6">
        Whether you want to start freelancing, reselling, or creating micro-services, our program will guide you through every step — from idea validation to scaling your side hustle with minimal investment.
    </p>

    {{-- Course Value --}}
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        Learn actionable strategies, build profitable habits, and gain access to tools and mentorship that will help you grow quickly without breaking the bank.
    </p>

    {{-- Join Now Button --}}
    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Now
    </a>

</section>

{{-- =========================
SIDE HUSTLE ROADMAP
========================= --}}
<section class="bg-gray-900 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">Your Low-Capital Side Hustle Roadmap</h2>
        <p class="text-gray-300 mb-6">Start, Grow, and Scale Your Small Venture</p>
        <p class="text-gray-300 mb-6">Learn actionable steps to launch profitable side hustles, validate ideas quickly, and grow efficiently.</p>
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
            Start Your Side Hustle Today
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
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Idea Generation</h3>
                    <p class="text-gray-300">
                        Identify low-capital business opportunities that solve real problems. Focus on ventures requiring minimal upfront investment but high profit potential.
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Market Validation</h3>
                    <p class="text-gray-300">
                        Test your idea quickly using surveys, social media, or pilot offers to ensure your hustle is profitable from day one.
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Lean Launch</h3>
                    <p class="text-gray-300">
                        Start small with minimal costs using lean methods. Focus on delivering value, minimizing expenses, and testing what works in real market conditions.
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Marketing & Growth</h3>
                    <p class="text-gray-300">
                        Discover cost-effective ways to reach customers and grow revenue. Use social media, word-of-mouth, and low-cost marketing channels to scale fast.
                    </p>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Scaling & Automation</h3>
                    <p class="text-gray-300">
                        Once profitable, scale efficiently without raising costs proportionally. Automate processes, outsource tasks, and leverage digital tools to maximize profits.
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{-- Final CTA --}}
    <div class="text-center mt-12">
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
            Start Your Side Hustle Today
        </a>
        <p class="text-gray-400 mt-4">
            Join hundreds of learners who have started profitable ventures with minimal capital
        </p>
    </div>
</section>

{{-- =========================
WHY CHOOSE OUR SIDE HUSTLE COURSE
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-12">

    {{-- Step-by-Step Learning --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2 text-left">
            <h2 class="text-3xl font-bold mb-4 text-gray-100">
                Step-by-Step Side Hustle Mastery
            </h2>
            <p class="text-gray-300 text-lg">
                Start and grow profitable side hustles with clarity and confidence.
                This course is divided into clearly structured modules that take you
                from identifying opportunities to scaling your side projects.
                Whether you’re new to entrepreneurship or looking to diversify your income,
                you’ll learn practical strategies to generate revenue and create sustainable growth.
            </p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/sidehustle/roadmap.png') }}"
                 alt="Side Hustle Learning Roadmap"
                 class="rounded-2xl shadow-lg w-full">
        </div>
    </div>

    {{-- Expert Mentorship --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/sidehustle/mentor.png') }}"
                 alt="Side Hustle Mentor"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Learn from Experienced Entrepreneurs
            </h3>
            <p class="text-gray-300">
                Real-world success doesn’t come from theory alone. Our mentors have launched multiple profitable ventures,
                scaled side projects into full-time businesses, and overcome the challenges you’ll face.
                Learn how to think like an entrepreneur, identify opportunities, manage risks, and grow your income efficiently.
            </p>
        </div>
    </div>

    {{-- Daily Support & Coaching --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10 md:flex-row-reverse">
        <div class="md:w-1/2">
            <img src="{{ asset('images/sidehustle/coaching.png') }}"
                 alt="Side Hustle Coaching"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Daily Guidance & Coaching
            </h3>
            <p class="text-gray-300">
                Building a successful side hustle requires consistent effort and guidance.
                Receive daily coaching, actionable advice, and feedback from experienced entrepreneurs.
                Ask questions, get clarity, and implement strategies designed to help you launch, grow, and scale your side projects.
            </p>
        </div>
    </div>

    {{-- Community --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/sidehustle/community.png') }}"
                 alt="Side Hustle Community"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Entrepreneurial Community
            </h3>
            <p class="text-gray-300">
                Join a community of motivated individuals focused on building side hustles, generating income, and achieving financial independence.
                Share ideas, strategies, and experiences while learning from peers and mentors in an environment designed to help everyone succeed together.
            </p>
        </div>
    </div>

    {{-- CTA --}}
    <div class="text-center mt-12">
        <a href="{{ route('pricing') }}"
           class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join the Side Hustle Course Now
        </a>
        <p class="text-gray-400 mt-4">
            Trusted by aspiring entrepreneurs worldwide to launch and scale side projects successfully
        </p>
    </div>

</section>


{{-- =========================
TESTIMONIALS
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-10">
    <h2 class="text-4xl font-extrabold text-center text-gray-100 mb-12">What Our Students Say</h2>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">"I started a small digital service business with just KES 5,000 and scaled it to KES 50,000 monthly revenue in 3 months!"</p>
            <h4 class="text-gray-100 font-bold">Alex W., Nairobi</h4>
        </div>
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">"This course gave me practical steps to start multiple side hustles without quitting my day job."</p>
            <h4 class="text-gray-100 font-bold">Maria K., Mombasa</h4>
        </div>
    </div>
</section>

{{-- =========================
GET ACCESS & PRICING
========================= --}}
<section class="max-w-7xl mx-auto py-20 px-6 text-center">

    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6">
        Get Started Today for Only KES 1,499
    </h2>

    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/side-hustle-access.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="mt-12 max-w-md mx-auto bg-gray-900 border border-cyan-400 rounded-3xl p-8 shadow-lg">
        <h3 class="text-2xl font-bold text-gray-100 mb-4">Take Action Now</h3>
        <div class="text-4xl font-extrabold text-cyan-400 mb-2">
            KES 1,499 <span class="text-gray-400 text-xl line-through ml-2">KES 9,999</span>
        </div>
        <div class="text-gray-300 mb-6">One-time access</div>

        <ul class="space-y-2 text-left text-gray-300 mb-6">
            <li>✔ Step-by-step tutorials</li>
            <li>✔ 10+ side hustle ideas</li>
            <li>✔ Mentorship & guidance</li>
            <li>✔ Community support</li>
            <li>✔ No prior experience needed</li>
            <li>✔ Learn at your own pace</li>
            <li>✔ Cancel anytime</li>
            <li>✔ Risk-free</li>
        </ul>

        <a href="{{ route('pricing') }}" class="block w-full bg-cyan-400 text-black font-bold py-4 rounded-xl hover:bg-cyan-500 transition mb-2">
            Join Next Level Africa Club
        </a>
        <p class="text-xs text-gray-400 mt-2">Lock in this price before it increases. Act fast.</p>
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
