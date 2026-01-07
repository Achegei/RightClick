@extends('layouts.front')

@section('title', 'Freelance Skills Campus | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto pt-20 pb-16 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Next Level Africa Club Logo" class="mx-auto mb-4 w-24 h-24">
    <h1 class="text-5xl md:text-6xl font-extrabold text-cyan-300 mb-3">
        Freelance Skills Campus — Next Level Africa Club
    </h1>
    <p class="text-gray-300 max-w-3xl mx-auto mb-6">
        Learn in-demand freelance skills, offer your services online, and earn a steady income from home.
    </p>
    <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
        Get Started
    </a>

    {{-- Video Placeholder --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/freelance-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Social Proof --}}
    <div class="mt-4 text-gray-300 text-lg">
        <span class="text-cyan-400 font-bold">{{ rand(35000, 50000) }}+</span> people have already started earning online
    </div>
</section>

{{-- =========================
INTRODUCTION / FREELANCE COURSE
========================= --}}
<section class="max-w-6xl mx-auto pt-8 pb-20 px-6 text-center">

    {{-- Main Heading --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Master Freelancing with Expert Guidance
    </h2>

    {{-- Subheading --}}
    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        Learn, Apply, and Earn from Anywhere
    </p>

    {{-- Intro Paragraph --}}
    <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto mb-6">
        Welcome to <strong>"The Freelance Skills Roadmap"</strong> — a structured program designed
        to help you develop marketable freelance skills, attract clients, and earn consistently online.
    </p>

    {{-- Course Value --}}
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        This course gives you hands-on projects, mentorship, and insider insights
        to build a professional freelancing career, even if you have no prior experience.
    </p>

    {{-- Why Freelance --}}
    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Why Freelancing?
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        Gain financial freedom and work from anywhere. Freelancing allows you
        to scale your income, choose your clients, and build a career on your terms.
    </p>

    {{-- Requirements --}}
    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Requirements
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-8">
        All you need is a computer, internet access, and a willingness to learn and execute consistently.
    </p>

    {{-- Join Now Button --}}
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
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">Freelance Skills Roadmap</h2>
        <p class="text-gray-300 mb-6">A Step-by-Step Guide to Earning Online</p>
        <p class="text-gray-300 mb-6">Unlock your earning potential: Learn high-demand skills, attract clients, and build a sustainable online income from home.</p>
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
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Identify Marketable Skills</h3>
                    <p class="text-gray-300">
                        Discover the most in-demand freelance skills online. Learn how to evaluate your strengths,
                        explore opportunities in web development, design, copywriting, digital marketing, and more.
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Build a Professional Portfolio</h3>
                    <p class="text-gray-300">
                        Create a portfolio that attracts clients. Learn how to showcase your work effectively, highlight your skills, and communicate your value to potential customers.
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Find and Pitch Clients</h3>
                    <p class="text-gray-300">
                        Learn how to find clients on platforms like Upwork, Fiverr, and LinkedIn. Craft persuasive proposals that win projects and start earning quickly.
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Deliver & Build Reputation</h3>
                    <p class="text-gray-300">
                        Master client communication, project management, and quality delivery.
                        Build a strong reputation, get positive reviews, and attract repeat clients.
                    </p>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Scale Your Freelance Business</h3>
                    <p class="text-gray-300">
                        Learn strategies to increase your rates, expand your client base, and explore recurring income streams.
                        Transition from a solo freelancer to running a scalable freelance business.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- =========================
WHY CHOOSE OUR FREELANCE COURSE
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 space-y-12">

    {{-- Step-by-Step Learning --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2 text-left">
            <h2 class="text-3xl font-bold mb-4 text-gray-100">
                Step-by-Step Freelance Mastery
            </h2>
            <p class="text-gray-300 text-lg">
                Learn freelance skills in a structured way. From beginner concepts to advanced client strategies, our modules guide you through building services, attracting clients, and generating consistent online income.
            </p>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/freelance/roadmap.png') }}"
                 alt="Freelance Roadmap"
                 class="rounded-2xl shadow-lg w-full">
        </div>
    </div>

    {{-- Expert Mentorship --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/freelance/mentor.png') }}"
                 alt="Freelance Mentor"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Learn from Proven Freelance Experts
            </h3>
            <p class="text-gray-300">
                Get guidance from top freelancers who have built six-figure online careers. Learn how they find clients, price services, handle projects, and scale their income — all inside a supportive, practical mentorship environment.
            </p>
        </div>
    </div>

    {{-- Daily Support & Coaching --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10 md:flex-row-reverse">
        <div class="md:w-1/2">
            <img src="{{ asset('images/freelance/coaching.png') }}"
                 alt="Freelance Coaching"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Daily Guidance & Project Support
            </h3>
            <p class="text-gray-300">
                Freelancing can be challenging without guidance. We provide daily support, answer questions, and offer strategic advice to help you land clients and deliver projects successfully.
            </p>
        </div>
    </div>

    {{-- Community --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/freelance/community.png') }}"
                 alt="Freelance Community"
                 class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">
                Freelance Community
            </h3>
            <p class="text-gray-300">
                Join a network of motivated freelancers who share strategies, experiences, and opportunities. Collaborate, get feedback, and grow your online business in a community that helps everyone succeed.
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
            Trusted by thousands of students worldwide to build freelance careers
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
            <p class="text-gray-300 mb-4">
                "I had no freelancing experience before this course. Within 2 months, I landed my first clients and now earn consistently online!"
            </p>
            <h4 class="text-gray-100 font-bold">Alex N., Nairobi</h4>
        </div>

        {{-- Testimonial 2 --}}
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">
                "The roadmap and mentorship provided here gave me the confidence to scale my freelancing business. Highly recommended for beginners!"
            </p>
            <h4 class="text-gray-100 font-bold">Sophia K., Mombasa</h4>
        </div>

        {{-- Testimonial 3 --}}
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">
                "Thanks to Next Level Africa Club, I transitioned from a part-time side hustle to a full-time freelance career. The strategies really work!"
            </p>
            <h4 class="text-gray-100 font-bold">Brian M., Kisumu</h4>
        </div>

        {{-- Testimonial 4 --}}
        <div class="bg-gray-800 rounded-2xl p-8 shadow-lg">
            <p class="text-gray-300 mb-4">
                "I learned how to pitch clients effectively and deliver value. Now I manage multiple projects and enjoy steady income online."
            </p>
            <h4 class="text-gray-100 font-bold">Linda T., Eldoret</h4>
        </div>
    </div>
</section>

{{-- =========================
GET ACCESS & PRICING
========================= --}}
<section class="max-w-7xl mx-auto py-20 px-6 text-center">

    {{-- Section Heading --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6">
        Get access to the ultimate freelancing training for only KES 1,999
    </h2>

    {{-- Video --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/freelance-access.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Pricing Card --}}
    <div class="mt-12 max-w-md mx-auto bg-gray-900 border border-cyan-400 rounded-3xl p-8 shadow-lg">
        <h3 class="text-2xl font-bold text-gray-100 mb-4">Take Action: Start your freelance career now</h3>
        <div class="text-4xl font-extrabold text-cyan-400 mb-2">
            KES 1,999 <span class="text-gray-400 text-xl line-through ml-2">KES 10,499</span>
        </div>
        <div class="text-gray-300 mb-6">One-time payment</div>

        <ul class="space-y-2 text-left text-gray-300 mb-6">
            <li>✔ Step-by-step freelance skill tutorials</li>
            <li>✔ Learn to attract and pitch clients</li>
            <li>✔ Mentorship from successful freelancers</li>
            <li>✔ Access to community chat groups</li>
            <li>✔ No prior experience required</li>
            <li>✔ Personalized learning roadmap</li>
            <li>✔ Cancel anytime</li>
            <li>✔ Risk-free, money-back guarantee</li>
        </ul>

        <a href="{{ route('pricing') }}" class="block w-full bg-cyan-400 text-black font-bold py-4 rounded-xl hover:bg-cyan-500 transition mb-2">
            Join Next Level Africa Club
        </a>
        <p class="text-xs text-gray-400 mt-2">Lock in this price before it increases. Start today.</p>
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
