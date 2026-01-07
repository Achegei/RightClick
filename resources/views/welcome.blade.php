@extends('layouts.front')

@section('seo_title', 'Next Level Africa Club — Money Making Is a Skill')
@section('meta_description', 'Money making is a skill. We teach you how to master it with real systems, mentors, and execution.')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-5xl mx-auto space-y-8">
    <h1 class="text-5xl md:text-6xl font-extrabold leading-tight text-gray-100">
    Next Level Africa
</h1>

<p class="text-xl text-gray-400 mt-4">
    Money-Making Skills. Real Systems. Real Execution.
</p>

    <h1 class="text-5xl md:text-6xl font-extrabold leading-tight text-gray-100">
        Money Making Is a Skill.<br>
        <span class="text-cyan-400">We Teach You How to Master It.</span>
    </h1>

    <p class="text-xl text-gray-400 max-w-3xl mx-auto">
        No hype. No fake promises.  
        Just real skills, real systems, and real execution.
    </p>

    {{-- VIDEO SLOT (LOCKED TO PAGE) --}}
    <div class="relative w-full max-w-4xl mx-auto rounded-3xl overflow-hidden shadow-2xl border border-gray-800">
        <video
            class="w-full"
            controls
            controlsList="nodownload noplaybackrate"
            disablePictureInPicture
            playsinline
        >
            <source src="{{ asset('videos/elite-intro.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    {{-- CTA --}}
    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black px-10 py-4 rounded-xl font-bold text-lg hover:bg-cyan-500 transition shadow-xl">
        Join Next Level Africa
    </a>

    {{-- SOCIAL PROOF --}}
    <p class="text-gray-400 mt-4">
    Join <span class="text-cyan-400 font-semibold">{{ number_format($userCount) }}</span> members already inside
    </p>


</section>

{{-- =========================
EDUCATION SYSTEM PROBLEM
========================= --}}
<section class="max-w-6xl mx-auto mt-32 grid md:grid-cols-2 gap-12 items-center">

    <div class="space-y-6">
        <h2 class="text-4xl font-extrabold text-gray-100">
            The modern education system<br>
            <span class="text-magenta-500">is designed to make you poor.</span>
        </h2>

        <p class="text-gray-400 text-lg">
            You were never taught how money actually works.
            You were trained to obey systems — not build leverage.
        </p>

        <p class="text-gray-400 text-lg">
            Imagine getting access to real multi-millionaire mentors
            who give you a **step-by-step path** to reach your goals
            as fast as possible.
        </p>

        <p class="text-gray-200 font-semibold text-lg">
            That is exactly what you find inside Next Level Africa.
        </p>
    </div>

    <div>
        <img src="{{ asset('images/education-broken.jpg') }}"
             class="rounded-3xl shadow-xl border border-gray-800"
             alt="Broken education system">
    </div>

</section>

{{-- =========================
THREE CORE PILLARS
========================= --}}
<section class="max-w-7xl mx-auto mt-32 space-y-20">

    {{-- PILLAR 1 --}}
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <img src="{{ asset('images/learning-app.jpg') }}" class="rounded-3xl shadow-xl border border-gray-800">

        <div class="space-y-4">
            <h3 class="text-3xl font-bold text-gray-100">
                Learn Life-Vital Lessons
            </h3>
            <p class="text-gray-400">
                World-class, custom-built learning application.
                Scale from zero to <span class="text-cyan-400 font-semibold">50K/month</span>
                as fast as possible.
            </p>
            <p class="text-gray-400">
                Master the exact skills required to maximize your income.
            </p>
        </div>
    </div>

    {{-- PILLAR 2 --}}
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-4">
            <h3 class="text-3xl font-bold text-gray-100">
                Join a Private Network
            </h3>
            <p class="text-gray-400">
                Celebrate wins with people who understand.
                Build friendships with like-minded builders.
            </p>
            <p class="text-gray-400">
                Network with <span class="text-cyan-400 font-semibold">100,000+</span>
                driven individuals on the same path.
            </p>
        </div>

        <img src="{{ asset('images/network.jpg') }}" class="rounded-3xl shadow-xl border border-gray-800">
    </div>

    {{-- PILLAR 3 --}}
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <img src="{{ asset('images/mentorship.jpg') }}" class="rounded-3xl shadow-xl border border-gray-800">

        <div class="space-y-4">
            <h3 class="text-3xl font-bold text-gray-100">
                Access Successful Millionaires
            </h3>
            <p class="text-gray-400">
                Mentors are hyper-successful in their fields.
                Get guided every step of your journey.
            </p>
            <p class="text-gray-400">
                1-on-1 advice from real industry experts.
            </p>
        </div>
    </div>

</section>

{{-- =========================
MID CTA
========================= --}}
<section class="text-center mt-32">
    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black px-12 py-5 rounded-xl font-bold text-lg hover:bg-magenta-600 transition shadow-xl">
        Join Next Level Africa
    </a>
</section>

{{-- =========================
WHAT YOU WILL LEARN
========================= --}}
<section class="max-w-7xl mx-auto mt-28">

    <h2 class="text-4xl font-extrabold text-center text-gray-100 mb-6">
        The Latest Information.
    </h2>

    <p class="text-center text-gray-400 max-w-3xl mx-auto mb-16">
        Next Level Africa is the first — and only — place that teaches you
        how to take advantage of what’s working **right now**.
        Our students receive the latest updates by <span class="text-cyan-400 font-semibold">8 AM</span>.
    </p>

    <div class="grid md:grid-cols-3 gap-8">

        @php
        $topics = [
            [
                'title' => 'Dropshipping & E-commerce',
                'slug'  => 'ecommerce',
                'image' => 'images/dropshipping.jpg',
                'intro' => 'Learn to start and scale an online store from scratch.'
            ],
            [
                'title' => 'Copywriting',
                'slug'  => 'copywriting',
                'image' => 'images/copywriting.jpg',
                'intro' => 'Master persuasive writing that sells products and ideas.'
            ],
            [
                'title' => 'Wealth with SACCOs',
                'slug'  => 'sacco-wealth',
                'image' => 'images/sacco.jpg',
                'intro' => 'Understand SACCO investments and grow your wealth safely.'
            ],
            [
                'title' => 'Stocks, Bonds & MMFs',
                'slug'  => 'stocks',
                'image' => 'images/stocks.jpg',
                'intro' => 'Build a diversified portfolio for long-term financial growth.'
            ],
            [
                'title' => 'Cryptocurrency & Forex',
                'slug'  => 'crypto',
                'image' => 'images/crypto.jpg',
                'intro' => 'Learn trading strategies for crypto and forex markets.'
            ],
            [
                'title' => 'Low-Capital Side Hustles',
                'slug'  => 'side-hustles',
                'image' => 'images/sidehustles.jpg',
                'intro' => 'Start profitable ventures with little money and scale fast.'
            ],
            [
                'title' => 'Online Freelance Skills',
                'slug'  => 'freelancing',
                'image' => 'images/freelance.jpg',
                'intro' => 'Offer services online and earn a steady income from home.'
            ],
            [
                'title' => 'Digital Income Systems',
                'slug'  => 'digital-marketing',
                'image' => 'images/digital.jpg',
                'intro' => 'Automate your online business for passive revenue streams.'
            ],
        ];
        @endphp
        @foreach($topics as $topic)
        <div class="bg-gray-900 rounded-3xl p-4 shadow-xl border border-gray-800 flex flex-col justify-between">
            <div>
                <div class="aspect-video rounded-xl overflow-hidden mb-4 bg-black">
                    <img src="{{ asset($topic['image']) }}" alt="{{ $topic['title'] }}" class="w-full h-full object-cover">
                </div>
                <h4 class="text-lg font-semibold text-gray-200 mb-2 text-center">
                    {{ $topic['title'] }}
                </h4>
                <p class="text-gray-400 text-sm mb-4 text-center">
                    {{ $topic['intro'] }}
                </p>
            </div>
            <div class="text-center">
                <a href="{{ route('landing.show', $topic['slug']) }}"
                   class="inline-block bg-cyan-400 text-black px-4 py-2 rounded-lg hover:bg-cyan-500 transition font-semibold">
                   Learn More
                </a>
            </div>
        </div>
        @endforeach

    </div>

</section>


{{-- =========================
FINAL CTA
========================= --}}
<section id="cta" class="text-center mt-32 mb-20 space-y-6">
    <h2 class="text-4xl font-extrabold text-gray-100">
        This Is Not Motivation.<br>
        This Is a System.
    </h2>

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black px-12 py-5 rounded-xl font-bold text-lg hover:bg-cyan-500 transition shadow-xl">
        Join Next Level Africa
    </a>
</section>

{{-- ========================= --}}
{{-- THE ELITE CLUB WINS --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl mb-24 text-center">

    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">
    Next Level Africa Wins
    </h2>

    <p class="text-gray-400 mb-10">
        Conspicuous results. Our members are winning.
    </p>

    {{-- Screenshot Grid --}}
    <div class="grid md:grid-cols-4 gap-6 mb-10">
        @for ($i = 1; $i <= 12; $i++)
            <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden hover:border-cyan-400 transition">
                <img
                    src="{{ asset('images/social-proof/proof-'.$i.'.jpg') }}"
                    alt="Elite Club Win"
                    class="w-full h-full object-cover"
                >
            </div>
        @endfor
    </div>

    {{-- CTA --}}
    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black px-10 py-4 rounded-xl font-extrabold hover:bg-cyan-500 transition">
        Join Next Level Africa
    </a>

    <p class="mt-4 text-gray-400">
        Join <span class="text-cyan-400 font-semibold">{{ number_format($userCount) }}</span> members already inside
    </p>

</section>
{{-- ========================= --}}
{{-- STUDENT INTERVIEWS --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl mb-24">

    <h2 class="text-3xl md:text-4xl font-extrabold text-white text-center mb-12">
        Our Students Are Levelling Up
    </h2>

    <div class="space-y-16">

        {{-- Interview 1 --}}
        <div class="grid md:grid-cols-2 gap-10 items-center">
            {{-- Video --}}
            <div class="rounded-2xl overflow-hidden border border-gray-800">
                <video controls class="w-full bg-black">
                    <source src="{{ asset('videos/interviews/crypto-nairobi.mp4') }}" type="video/mp4">
                </video>
            </div>

            {{-- Text --}}
            <div>
                <h3 class="text-xl font-bold text-white mb-3">
                    Crypto & Shares — Nairobi County
                </h3>
                <p class="text-gray-400">
                    Started with zero knowledge. Within months, scaled to
                    <span class="text-cyan-400 font-semibold">KES 450,000/month</span>
                    trading crypto and long-term shares usingNext Level Africa Club systems.
                </p>
            </div>
        </div>

        {{-- Interview 2 --}}
        <div class="grid md:grid-cols-2 gap-10 items-center">
            {{-- Text --}}
            <div>
                <h3 class="text-xl font-bold text-white mb-3">
                    Dropshipping & E-commerce — Kiambu County
                </h3>
                <p class="text-gray-400">
                    Built a profitable e-commerce brand from scratch.
                    Consistently hitting
                    <span class="text-cyan-400 font-semibold">KES 600,000+/month</span>
                    using paid ads & supplier systems.
                </p>
            </div>

            {{-- Video --}}
            <div class="rounded-2xl overflow-hidden border border-gray-800">
                <video controls class="w-full bg-black">
                    <source src="{{ asset('videos/interviews/dropshipping-kiambu.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>

        {{-- Interview 3 --}}
        <div class="grid md:grid-cols-2 gap-10 items-center">
            {{-- Video --}}
            <div class="rounded-2xl overflow-hidden border border-gray-800">
                <video controls class="w-full bg-black">
                    <source src="{{ asset('videos/interviews/sidehustles-kisumu.mp4') }}" type="video/mp4">
                </video>
            </div>

            {{-- Text --}}
            <div>
                <h3 class="text-xl font-bold text-white mb-3">
                    Low-Capital Side Hustles — Kisumu County
                </h3>
                <p class="text-gray-400">
                    Combined MMFs, bonds, and digital side hustles to reach
                    <span class="text-cyan-400 font-semibold">KES 280,000/month</span>
                    while working full-time.
                </p>
            </div>
        </div>

    </div>

    {{-- CTA --}}
    <div class="text-center mt-16">
        <a href="{{ route('pricing') }}"
           class="inline-block bg-cyan-400 text-black px-10 py-4 rounded-xl font-extrabold hover:bg-magenta-600 transition">
            Join Next Level Africa
        </a>

        <p class="mt-3 text-gray-400 text-sm">
            Lock in your price fast —
            <span class="text-magenta-500 font-semibold uppercase">Act First</span>
        </p>
    </div>

</section>
{{-- ========================= --}}
{{-- WHAT YOU GET ACCESS TO --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl mb-24 space-y-20">

    {{-- Block 1 --}}
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <img src="{{ asset('images/access-learning.png') }}" class="rounded-2xl" alt="">
        <div>
            <h3 class="text-2xl font-bold text-white mb-4">
                Step-by-Step Learning
            </h3>
            <p class="text-gray-400">
                Access <span class="text-cyan-400 font-semibold">100+ video courses</span>
                and structured tutorials covering everything from modern business fundamentals
                to niche money-making strategies.
                <br><br>
                Easy-to-follow programs for financial success powered by a
                <span class="text-cyan-400 font-semibold">hyper-advanced learning application</span>.
            </p>
        </div>
    </div>

    {{-- Block 2 --}}
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h3 class="text-2xl font-bold text-white mb-4">
                Daily Live Coaching With Millionaires
            </h3>
            <p class="text-gray-400">
                Every mentor inside Next Level Africa has made millions using
                the exact methods they teach.
                <br><br>
                From making your first shilling to scaling a
                <span class="text-cyan-400 font-semibold">multi-million-dollar business</span>,
                you receive daily lessons, organized coursework, and constant mentorship.
                <br><br>
                <span class="text-magenta-500 font-semibold">
                    Next Level Africa Club is unmatched.
                </span>
            </p>
        </div>
        <img src="{{ asset('images/access-mentors.png') }}" class="rounded-2xl" alt="">
    </div>

    {{-- Block 3 --}}
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <img src="{{ asset('images/access-community.png') }}" class="rounded-2xl" alt="">
        <div>
            <h3 class="text-2xl font-bold text-white mb-4">
                Exclusive High-Focus Community
            </h3>
            <p class="text-gray-400">
                A private environment with like-minded members on the same mission:
                <span class="text-cyan-400 font-semibold">getting rich</span>.
                <br><br>
                Network with ambitious builders, celebrate wins with people
                who understand your goals, and make friends who push you forward.
            </p>

            <p class="mt-4 text-gray-500 text-sm">
                {{ number_format($userCount) }} active members and growing
            </p>
        </div>
    </div>

</section>
{{-- ========================= --}}
{{-- JOIN CTA (REINFORCEMENT) --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl text-center mb-28">

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black px-12 py-5 rounded-2xl font-extrabold text-lg hover:bg-cyan-500 transition">
        Join Next Level Africa Club
    </a>

    <p class="mt-4 text-gray-300 text-sm">
        Lock in the price before it increases.
        <span class="text-magenta-500 font-semibold uppercase">Act First</span>
    </p>

</section>
{{-- ========================= --}}
{{-- ACHIEVE YOUR GOALS --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl mb-32">

    <div class="grid md:grid-cols-2 gap-14 items-center">

        {{-- Text --}}
        <div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">
                Achieve Your Goals
            </h2>

            <p class="text-gray-400 leading-relaxed space-y-4">
                <span class="block">
                    Money making is a skill. Like every other skill, it can be learned.
                </span>

                <span class="block">
                    The speed at which you learn depends entirely on your coaches and
                    the environment you are taught in.
                </span>

                <span class="block">
                    Our mentors know the business models they teach.
                    They know what it takes to be profitable.
                </span>

                <span class="block">
                    They are the first to identify and use new disruptive technologies
                    and strategies whenever they appear.
                </span>

                <span class="block text-cyan-400 font-semibold">
                    Next Level Africa Club is the ultimate all-in-one learning platform —
                    guiding you from your first shilling online to scaling a
                    multi-million shilling business.
                </span>

                <span class="block">
                    There is no better place to learn how to make money online today
                    than <span class="text-white font-semibold">Next Level Africa Club</span>.
                </span>
            </p>
        </div>

        {{-- Image --}}
        <div>
            <img
                src="{{ asset('images/achieve-goals.png') }}"
                alt="Achieve Your Goals"
                class="rounded-2xl shadow-lg"
            >
        </div>

    </div>

</section>
{{-- ========================= --}}
{{-- THE CHOICE IS YOURS --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl mb-28 text-center">

    <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-10">
        The Choice Is Yours
    </h2>

    <div class="rounded-2xl overflow-hidden border border-gray-800">
        <video controls class="w-full bg-black">
            <source src="{{ asset('videos/choice-is-yours.mp4') }}" type="video/mp4">
        </video>
    </div>

</section>
{{-- ========================= --}}
{{-- TAKE ACTION CARD --}}
{{-- ========================= --}}
<section class="w-full max-w-4xl mb-32 mx-auto">

    <div class="bg-gray-900 border border-gray-800 rounded-3xl p-10 text-center">

        <h3 class="text-3xl font-extrabold text-white mb-4">
            Take Action
        </h3>

        <p class="text-gray-400 mb-6">
            You need to act now.
        </p>

        {{-- Price --}}
        <div class="mb-6">
            <span class="text-gray-500 line-through text-lg">
                KES 10,499
            </span>
            <div class="text-5xl font-extrabold text-cyan-400 mt-2">
                KES 1,999
            </div>
            <p class="text-gray-400 text-sm mt-1">
                Forever
            </p>
        </div>

        {{-- Features --}}
        <ul class="text-gray-300 space-y-2 mb-8 text-center max-w-md mx-auto">
            <li>✔ Simple step-by-step tutorials</li>
            <li>✔ 15 wealth creation methods</li>
            <li>✔ Access to millionaire mentors</li>
            <li>✔ Community chat groups</li>
            <li>✔ No experience needed</li>
            <li>✔ Custom-made learning</li>
            <li>✔ Cancel anytime</li>
            <li>✔ Risk-free</li>
        </ul>

        {{-- CTA --}}
        <a href="{{ route('pricing') }}"
            class="inline-block bg-cyan-400 text-black px-12 py-5 rounded-2xl font-extrabold text-lg hover:bg-cyan-500 transition">
            Join Next Level Africa Club
        </a>

        <p class="mt-4 text-gray-400 text-sm">
            Lock in the price before it increases.
            <span class="text-magenta-500 font-semibold uppercase">Act First</span>
        </p>

    </div>

</section>
{{-- ========================= --}}
{{-- OR DO NOTHING --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl mb-32 text-center">

    <div class="flex justify-center mb-6">
        <img
            src="{{ asset('images/warning-sign.png') }}"
            alt="Warning"
            class="w-24 h-24"
        >
    </div>

    <h2 class="text-5xl font-extrabold text-white mb-6">
        OR DO NOTHING
    </h2>

    <p class="text-xl text-gray-300 mb-8">
        LOCK IN YOUR PRICE OF
        <span class="text-cyan-400 font-extrabold">KES 1,999</span>
    </p>

    <p class="text-gray-400 max-w-3xl mx-auto mb-8 leading-relaxed">
        The price will increase to
        <span class="text-magenta-500 font-semibold">KES 10,499 / month</span>.
        <br><br>
        This is your last chance.
        Hundreds of thousands have already joined Next Level Africa Club
        and are on their way to financial freedom.
        <br><br>
        Don’t miss out on this opportunity.
    </p>

    {{-- Final CTA --}}
    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black px-14 py-5 rounded-2xl font-extrabold text-lg hover:bg-cyan-500 transition">
        Join Next Level Africa Club
    </a>

    <p class="mt-4 text-gray-400 text-sm">
        {{ number_format($userCount) }} members already inside
    </p>

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

        {{-- Live Chat --}}
        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 text-center">
            <h3 class="text-lg font-semibold text-white mb-2">
                Still have questions?
            </h3>
            <p class="text-gray-400 mb-4">
                Engage us via live chat for instant support.
            </p>
            <button class="bg-gray-800 hover:bg-gray-700 text-cyan-400 px-8 py-3 rounded-xl font-semibold transition">
                Live Chat
            </button>
        </div>

    </div>

</section>

{{-- ========================= --}}
{{-- FINAL CTA + LOGO --}}
{{-- ========================= --}}
<section class="w-full max-w-6xl text-center mb-24">

    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black px-14 py-5 rounded-2xl font-extrabold text-lg hover:bg-cyan-500 transition">
        Join Next Level Africa Club
    </a>

    <div class="mt-10 flex justify-center">
        <img
            src="{{ asset('images/logo.png') }}"
            alt="The Elite Club"
            class="w-20 h-20 opacity-90"
        >
    </div>

</section>

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

