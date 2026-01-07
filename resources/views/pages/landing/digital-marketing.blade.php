@extends('layouts.front')

@section('title', 'Digital Income Systems | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto pt-20 pb-16 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Next Level Africa Club Logo" class="mx-auto mb-4 w-24 h-24">
    <h1 class="text-5xl md:text-6xl font-extrabold text-cyan-300 mb-3">
        Digital Income Systems — Next Level Africa Club
    </h1>
    <p class="text-gray-300 max-w-3xl mx-auto mb-6">
        Automate your online business and unlock passive revenue streams with proven digital systems.
    </p>
    <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
        Get Started
    </a>

    {{-- Video Placeholder --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/digital-income-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Social Proof --}}
    <div class="mt-4 text-gray-300 text-lg">
        <span class="text-cyan-400 font-bold">{{ rand(25000, 40000) }}+</span> people have already built automated income streams
    </div>
</section>

{{-- =========================
INTRODUCTION / COURSE OVERVIEW
========================= --}}
<section class="max-w-6xl mx-auto pt-8 pb-20 px-6 text-center">

    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Build Your Digital Income System
    </h2>

    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        Step-by-Step Guidance for Automating Online Revenue
    </p>

    <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto mb-6">
        Learn how to set up automated online businesses that generate income consistently, even while you sleep. 
        Our program guides you through creating systems for e-commerce, digital products, affiliate marketing, 
        and other online revenue streams—all tailored to beginners and experienced entrepreneurs alike.
    </p>

    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        From setting up your first funnel to scaling multiple streams, we provide mentorship, templates, and 
        strategies to reduce trial-and-error and maximize your passive income potential.
    </p>

    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Why Automate?
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        Automation allows you to free your time, scale faster, and generate revenue 24/7. 
        With the right systems in place, your business can work for you while you focus on growth.
    </p>

    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Requirements
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-8">
        No prior experience is required. A laptop, internet connection, and willingness to implement proven systems are enough to get started.
    </p>

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Now
    </a>

</section>

{{-- =========================
PERSONALIZED ROADMAP SECTION
========================= --}}
<section class="bg-gray-900 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">Your Digital Income Roadmap</h2>
        <p class="text-gray-300 mb-6">Step-by-Step Guide to Automating Your Business</p>
        <p class="text-gray-300 mb-6">
            Learn how to create, launch, and automate profitable online systems that generate consistent revenue while you focus on other opportunities.
        </p>
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join the Next Level Africa Club
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
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Foundation & Market Research</h3>
                    <p class="text-gray-300">
                        Identify profitable niches, research audience demand, and learn how to select products or services that generate high ROI. Lay the groundwork for your digital income system.
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">System Setup & Automation</h3>
                    <p class="text-gray-300">
                        Build the infrastructure for your business: automated funnels, payment gateways, email sequences, and delivery systems. Reduce manual work and streamline operations.
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Marketing & Client Acquisition</h3>
                    <p class="text-gray-300">
                        Learn how to attract leads through paid ads, social media, content marketing, and email campaigns. Convert prospects into paying customers efficiently.
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Scaling & Optimization</h3>
                    <p class="text-gray-300">
                        Refine your systems, split-test funnels, and optimize automation for higher revenue. Scale your digital income streams without increasing your workload.
                    </p>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Ongoing Growth & Passive Revenue</h3>
                    <p class="text-gray-300">
                        Continue to automate, expand, and diversify your online business. Reinvest profits, add new streams, and enjoy a fully passive income portfolio that grows over time.
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

    {{-- Step-by-Step Systems --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2 text-left">
            <h2 class="text-3xl font-bold mb-4 text-gray-100">Systemized, Step-by-Step Learning</h2>
            <p class="text-gray-300 text-lg">
                This course breaks down digital income into clear, repeatable systems.
                You’ll learn how to build automated online businesses step by step —
                from idea validation to setup, automation, and scaling.
                No guesswork. No overwhelm. Just proven systems that work.
            </p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/roadmap.png') }}" alt="Digital Income Systems Roadmap" class="rounded-2xl shadow-lg w-full">
        </div>
    </div>

    {{-- Proven Digital Systems Mentor --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/professor.png') }}" alt="Digital Systems Mentor" class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Learn From People Who Run Real Digital Systems
            </h3>
            <p class="text-gray-300">
                You’re not learning theory — you’re learning from builders.
                Our mentors actively run automated digital income systems across
                ecommerce, content, funnels, and AI-powered workflows.
                Every lesson is based on real-world execution, not hype.
            </p>
        </div>
    </div>

    {{-- Automation & Ongoing Support --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10 md:flex-row-reverse">
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/coaching.png') }}" alt="Automation Support" class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Automation, Support & Optimization
            </h3>
            <p class="text-gray-300">
                Building digital income is not about working harder — it’s about
                designing smarter systems. You’ll receive ongoing support to help
                you automate tasks, optimize conversions, and remove bottlenecks
                so your income can grow even when you’re offline.
            </p>
        </div>
    </div>

    {{-- Community --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/community.png') }}" alt="Digital Income Community" class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">Builders-Only Community</h3>
            <p class="text-gray-300">
                Inside the Digital Income Systems community, you’ll connect with
                people actively building automated income streams.
                Share systems, tools, results, and lessons learned —
                all inside a focused environment designed for execution and growth.
            </p>
        </div>
    </div>

    <div class="text-center mt-12">
        <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
            Join Next Level Africa Club
        </a>
        <p class="text-gray-400 mt-4">
            Trusted by 200,000+ students building modern digital income systems
        </p>
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
            <p class="text-gray-300 mb-4">"I built my first automated online store in 30 days and now earn consistent revenue while focusing on other projects."</p>
            <h4 class="text-gray-100 font-bold">Alex N., Nairobi</h4>
        </div>
        {{-- Testimonial 2 --}}
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">"The systems taught in Next Level Africa Club allowed me to create multiple passive income streams. My life has completely changed."</p>
            <h4 class="text-gray-100 font-bold">Sophia K., Mombasa</h4>
        </div>
    </div>
</section>

{{-- =========================
GET ACCESS & PRICING
========================= --}}
<section class="max-w-7xl mx-auto py-20 px-6 text-center">

    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6">
        Get access to Digital Income Systems for only KES 1,999
    </h2>

    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/digital-income-access.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="mt-12 max-w-md mx-auto bg-gray-900 border border-cyan-400 rounded-3xl p-8 shadow-lg">
        <h3 class="text-2xl font-bold text-gray-100 mb-4">Start building your automated business today</h3>
        <div class="text-4xl font-extrabold text-cyan-400 mb-2">
            KES 1,999 <span class="text-gray-400 text-xl line-through ml-2">KES 10,499</span>
        </div>
        <div class="text-gray-300 mb-6">Lifetime Access</div>

        <ul class="space-y-2 text-left text-gray-300 mb-6">
            <li>✔ Step-by-step automation tutorials</li>
            <li>✔ Multiple digital income strategies</li>
            <li>✔ Mentorship from successful entrepreneurs</li>
            <li>✔ Community chat groups</li>
            <li>✔ No prior experience needed</li>
            <li>✔ Custom-made learning paths</li>
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

