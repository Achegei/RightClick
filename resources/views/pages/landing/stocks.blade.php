@extends('layouts.front')

@section('title', 'E-commerce Campus | Next Level Africa Club')

@section('content')

{{-- =========================
HERO SECTION
========================= --}}
<section class="text-center max-w-7xl mx-auto pt-20 pb-16 px-6">
    <img src="{{ asset('images/logo.png') }}" alt="Next Level Africa Club Logo" class="mx-auto mb-4 w-24 h-24">
    <h1 class="text-5xl md:text-6xl font-extrabold text-cyan-300 mb-3">
        Stocks Campus — The Next Level Africa Club
    </h1>
    <p class="text-gray-300 max-w-3xl mx-auto mb-6">
        Uncover the strategies and wisdom of a millionaire trader to propel your stock trading journey towards success.
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
INTRODUCTION / STOCK TRADING COURSE
========================= --}}
<section class="max-w-6xl mx-auto pt-8 pb-20 px-6 text-center">

    {{-- Main Heading --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Master Stock Trading with a Millionaire Mentor
    </h2>

    {{-- Subheading --}}
    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        Designed for Traders of All Levels
    </p>

    {{-- Intro Paragraph --}}
    <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto mb-6">
        Achieving proficiency in stock trading is now simpler than ever with
        <strong>Professor Ayush Sharma</strong> as your mentor.
        Welcome to <strong>"The Real World Stocks Course"</strong> — a structured
        program built to help you master the financial markets with confidence.
    </p>

    {{-- Course Value --}}
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        This comprehensive course offers structured learning, daily guidance,
        and invaluable industry insights to help you trade smarter, manage risk,
        and build consistent income in the markets.
    </p>

    {{-- Why Stocks --}}
    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Why Stocks?
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-6">
        Gain control over your time and income by mastering stock trading.
        Trading allows you to work independently, scale your earnings,
        and operate from anywhere in the world.
    </p>

    {{-- Requirements --}}
    <h3 class="text-2xl font-semibold text-cyan-400 mb-2">
        Requirements
    </h3>
    <p class="text-gray-300 text-lg max-w-3xl mx-auto mb-8">
        A minimum capital requirement of <strong>$2,000</strong> is recommended
        to apply the strategies taught effectively and manage risk responsibly.
    </p>

    {{-- Join Now Button --}}
    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join Now
    </a>

</section>
{{-- =========================
TAILORED STOCK TRADING ROADMAP
========================= --}}
<section class="max-w-6xl mx-auto py-20 px-6 text-center">

    {{-- Section Title --}}
    <h2 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-4">
        Tailored Stock Trading Roadmap
    </h2>

    {{-- Subtitle --}}
    <p class="text-cyan-400 text-xl md:text-2xl font-semibold mb-6">
        Your Step-by-Step Path to Success in the Financial Markets
    </p>

    {{-- Description --}}
    <p class="text-gray-300 text-lg md:text-xl max-w-4xl mx-auto mb-10">
        Learn how to attract high-value investments, manage your portfolio efficiently,
        and thrive in the competitive world of stock trading. This roadmap is designed
        to take you from fundamentals to confident execution with clarity and precision.
    </p>

    {{-- CTA Button --}}
    <a href="{{ route('pricing') }}"
       class="inline-block bg-cyan-400 text-black font-bold px-10 py-4 rounded-xl hover:bg-cyan-500 transition">
        Join the Next Level Africa Club
    </a>

</section>

{{-- =========================
PERSONALIZED ROADMAP SECTION
========================= --}}
<section class="bg-gray-900 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-100 mb-4">Stock Market Fundamentals</h2>
        <p class="text-gray-300 mb-6">A Step-by-Step Guide to Success</p>
        <p class="text-gray-300 mb-6">A Unlock the Power of Stock Trading: Master proven strategies to attract high-value investments, manage your portfolio with confidence, and succeed in today’s competitive stock market.</p>
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
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Stock Market Fundamentals</h3>
                    <p class="text-gray-300">
                        Gain a foundational understanding of stock market basics and terminology. Explore the significance of stock markets in the financial world and how they function. Start your journey by choosing a trusted online brokerage platform to open and fund your stock trading account with ease.
                    </p>
                </div>
            </div>

            {{-- Step 2 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">02</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Basic Trading Strategies</h3>
                    <p class="text-gray-300">
                        Delve into fundamental trading strategies suitable for beginners. Learn about essential risk management principles to protect your investments. Master the art of making your first trades while comprehending the importance of minimizing risks.
                    </p>
                </div>
            </div>

            {{-- Step 3 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">03</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Advanced Trading Techniques</h3>
                    <p class="text-gray-300">
                        Elevate your skills with advanced technical analysis methods and trading patterns. Craft a personalized trading plan rooted in technical indicators to enhance decision-making. Simultaneously, gain insights into options trading fundamentals and advanced risk management strategies for trading discipline.
                    </p>
                </div>
            </div>

            {{-- Step 4 --}}
            <div class="relative flex justify-end -mt-8">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">04</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Trading Strategies Mastery</h3>
                    <p class="text-gray-300">

Refine your expertise by mastering advanced options trading strategies, including spreads. Develop a comprehensive understanding of income generation and effective risk mitigation through options. Explore advanced trading techniques, such as swing trading, day trading, and quantitative trading, while delving into the realm of algorithmic trading to expand your trading toolkit.
                    </p>
                </div>
            </div>

            {{-- Step 5 --}}
            <div class="relative flex justify-start">
                <div class="bg-gray-800 rounded-2xl p-6 w-80 shadow-lg border border-gray-700">
                    <span class="text-cyan-400 font-bold text-xl">05</span>
                    <h3 class="text-xl font-semibold text-gray-100 mt-2 mb-2">Portfolio Management and Ongoing Learning</h3>
                    <p class="text-gray-300">
                        Learn to construct and optimize a diversified stock portfolio using advanced portfolio optimization techniques. As you progress, embrace continuous learning through webinars, seminars, and networking with seasoned traders. Stay updated with evolving market trends and strategies to maintain your edge in the dynamic world of stock trading.
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
                Join our course for a structured journey into the world of stock trading. With a curriculum divided into 6 comprehensive categories, it serves as your step-by-step guide to mastering stock trading strategies. Whether you're a novice or a seasoned investor, our course offers actionable insights and techniques to enhance your stock trading skills and boost your financial success.
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
            <h3 class="text-2xl font-bold text-gray-100 mb-4">Stock Trading Success with Millionaire Expert</h3>
            <p class="text-gray-300">
          Imagine having a mentor who not only comprehends the nuances of stock trading but has also achieved remarkable financial success in the field. Meet Professor Ayush Sharma, your guiding light in the Stocks Campus. With a multimillion-dollar track record in stock trading, he's not just an educator; he's a seasoned expert in the realm of financial assets. His wealth of stock trading knowledge and experience will empower you to pursue your financial dreams through the art of strategic stock trading.
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
              Thriving in the Stocks Campus demands dedication and a steadfast mindset, especially given the dynamic nature of stock trading. That's why we provide daily support and expert coaching to fortify your mental resilience. Our committed team is at your service, ready to address your queries, offer constructive guidance, and provide priceless insights. With our mentorship, you'll stay motivated, refine your skills, and navigate the ever-evolving world of stock trading, one day at a time.
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
            Within the Stocks Campus community, enthusiasts flourish in an environment where collaboration and mutual support reign supreme. Here, individuals driven by a shared passion for financial growth unite to learn, exchange valuable insights, and collectively thrive. Our platform nurtures a sense of camaraderie, guaranteeing that everyone progresses together, bolstered by a like-minded community that shares not just knowledge but also a unified vision of success in the world of stock trading.
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
