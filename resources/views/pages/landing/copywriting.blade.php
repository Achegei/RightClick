@extends('layouts.front')

@section('title', 'E-commerce Campus | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto pt-20 pb-16 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Elite Club Logo" class="mx-auto mb-4 w-24 h-24">
    <h1 class="text-5xl md:text-6xl font-extrabold text-cyan-300 mb-3">
        Copywriting Campus — Next Level Africa Club
    </h1>
    <p class="text-gray-300 max-w-3xl mx-auto mb-6">
        Learn the Secrets of Writing Profitable Copy, Whether You're a Beginner or an Experienced Copywriter.
    </p>
    <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-8 py-4 rounded-xl hover:bg-cyan-500 transition">
        Get Started
    </a>

    {{-- Video Placeholder --}}
    <div class="mt-8 max-w-4xl mx-auto">
        <video class="w-full rounded-2xl shadow-lg" controls poster="{{ asset('images/video-placeholder.jpg') }}">
            <source src="{{ asset('videos/ecommerce-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- Social Proof --}}
    <div class="mt-4 text-gray-300 text-lg">
        <span class="text-cyan-400 font-bold">{{ rand(35000, 50000) }}+</span> people have already changed their lives in Nairobi
    </div>
</section>

{{-- =========================
INTRODUCTION / COPYWRITING COURSE
========================= --}}
<section class="max-w-6xl mx-auto pt-8 pb-20 px-6 text-center">
    {{-- Main Heading --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Master the Art of Copywriting with Millionaire Professor Andrew Bass
    </h2>

    {{-- Intro Paragraph --}}
    <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto mb-4">
        Welcome to <strong>"The Real World Copywriting Course"</strong> led by Professor Andrew Bass. With over a million dollars in earnings from his copywriting skills, Professor Bass is here to guide you through the world of copywriting and help you unlock the potential to earn a six-figure income.
    </p>

    {{-- Why Copywriting --}}
    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">Why Copywriting?</h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-4">
        Because it’s more than just writing—it’s a strategic tool for success. Copywriting allows you to influence, persuade, and drive action in any business or venture.
    </p>

    {{-- Unleash Potential --}}
    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">Unleash Potential</h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        Copywriting is the art of persuading your audience through words. Learn the secrets, strategies, and techniques that have earned millions and can help you generate substantial income, no matter your experience level.
    </p>

    {{-- Join Now Button --}}
    <a href="{{ route('pricing') }}" class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Now
    </a>
</section>


{{-- =========================
PERSONALIZED ROADMAP SECTION
========================= --}}
<section class="bg-gray-900 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">Personalized Copywriting Roadmap</h2>
        <p class="text-gray-300 mb-6">A Step-by-Step Guide to Success</p>
        <p class="text-gray-300 mb-6">A Unlock the Power of Copywriting: Discover How to Attract High-Value Clients, Manage Copywriting Projects Efficiently, and Thrive in the Competitive World of SEO Copywriting”</p>
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
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Find Your Copywriting Focus</h3>
                    <p class="text-gray-300">
                        Embark on a comprehensive exploration into the core principles of copywriting. Gain a thorough understanding of the art and science behind crafting compelling content, discover the various writing styles, and learn why effective copy is pivotal in today’s digital marketing landscape.
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Hone Your Skills</h3>
                    <p class="text-gray-300">
                        Copywriting is an art that requires practice and continuous learning.This includes understanding the principles of persuasive writing, mastering SEO techniques, and staying up-to-date with the latest marketing trends. Consider taking courses, reading books, or learning from successful copywriters to improve your skills.
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Build a Portfolio</h3>
                    <p class="text-gray-300">
                        A strong portfolio is crucial to showcase your skills and attract potential clients. This could include blog posts, sales pages, email campaigns, and more. Make sure your portfolio reflects the type of work you want to be hired for and demonstrates your ability to deliver results.
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Promote Your Services</h3>
                    <p class="text-gray-300">
                    Once you’ve honed your skills and built a portfolio, it’s time to market your services. This could include creating a professional website, leveraging social media platforms, attending networking events, or using freelance platforms. Remember to highlight your unique selling proposition and why clients should choose you over others.
                    </p>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Deliver Quality Work</h3>
                    <p class="text-gray-300">
                        After landing a client, it’s essential to deliver high-quality work. This means meeting deadlines, communicating effectively with the client, and always striving to exceed client expectations. By delivering quality work consistently, you can build long-term relationships with clients and get repeat business.
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
            <h2 class="text-3xl font-bold mb-4 text-gray-100">Step-by-Step Learning:</h2>
            <p class="text-gray-300 text-lg">
                Unlock the Art of Copywriting with Our Comprehensive Course
                Our course takes you on a guided journey through the intricate world of copywriting. Divided into 11 comprehensive categories, it's designed as a step-by-step guide, ensuring that you not only learn but also master the art of persuasive writing. 
                Whether you're a complete novice or an experienced wordsmith, our course offers valuable insights and techniques that can transform your writing skills.
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
            <h3 class="text-2xl font-bold text-gray-100 mb-4">Millionaire Professor:</h3>
            <p class="text-gray-300">
               Learn from a Copywriting Maestro with a Seven-Figure Track Record
            Imagine having a mentor who not only knows the ins and outs of copywriting but has also amassed millions through it. 
            Meet Professor Miller, your guide on this extraordinary journey. 
            With a seven-figure track record, he's not just an instructor; he's a proven expert. He brings to the table the wealth of knowledge and experience that can empower you to reach your financial goals through the art of persuasive copy.
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
             Stay on Course with Our Daily Support and Expert Coaching
                Success in copywriting demands consistent effort and motivation. That's why we provide daily support and expert coaching to keep you on track. 
                Our dedicated team is here to answer your questions, provide feedback, and offer valuable insights. With our guidance, you'll stay motivated, refine your skills, and conquer the world of copywriting one day at a time.
            </p>
        </div>
    </div>

    {{-- Community --}}
    <div class="border border-cyan-400 rounded-3xl p-12 flex flex-col md:flex-row items-center gap-10">
        <div class="md:w-1/2">
            <img src="{{ asset('images/ecommerce/community.png') }}" alt="Community" class="rounded-2xl shadow-lg w-full">
        </div>
        <div class="md:w-1/2 text-left">
            <h3 class="text-2xl font-bold text-gray-100 mb-4">Community:</h3>
            <p class="text-gray-300">
                Dive Deeper into Copywriting with Daily Nuggets of Wisdom
                In the ever-evolving world of copywriting, knowledge is power. Our course goes beyond the basics by offering daily industry insights and thought-provoking questions. 
                These bite-sized nuggets of wisdom will expand your understanding of the copywriting field, helping you stay at the forefront of industry trends and strategies. It's the edge you need to thrive in this competitive landscape.
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
