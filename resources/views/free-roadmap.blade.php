@extends('layouts.front')

@section('title', 'Free Roadmap — Land Your First Freelance Client')

@section('content')
<div class="max-w-7xl mx-auto px-6 pt-28">

    {{-- Hero --}}
    <section class="text-center mb-20">
        <h1 class="text-5xl font-extrabold mb-4 text-gray-900">Your Free Freelance Roadmap</h1>
        <p class="text-lg text-gray-700 mb-8">Juicy insights, snippets, and videos to start landing your first paying client online.</p>
        <a href="#snippets" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">Start Learning Free</a>
    </section>

    {{-- Snippets --}}
    <section id="snippets" class="grid md:grid-cols-3 gap-8 mb-20">
        @foreach($snippets as $snippet)
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition">
            <h3 class="font-bold text-xl mb-3">{{ $snippet['title'] }}</h3>
            <p class="text-gray-600">{{ $snippet['content'] }}</p>
        </div>
        @endforeach
    </section>

    {{-- Videos --}}
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Watch & Learn</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($videos as $video)
            <div class="rounded-2xl overflow-hidden shadow-lg">
                <iframe class="w-full h-64" src="https://www.youtube.com/embed/{{ $video }}" title="Motivation Video" allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Upgrade Teaser --}}
    <section class="bg-gradient-to-r from-purple-50 via-white to-blue-50 p-12 rounded-2xl shadow-xl text-center mb-20">
        <h2 class="text-3xl font-bold mb-4">Want Full Access? Go Pro</h2>
        <p class="text-gray-700 mb-6 max-w-xl mx-auto">
            Complete step-by-step roadmap, client exercises, portfolio templates, and mentorship support — unlock the full system now.
        </p>
        <a href="{{ route('checkout', ['tier' => 'pro']) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-10 py-4 rounded-lg shadow-lg transition transform hover:scale-105">
            Unlock Pro
        </a>
    </section>

</div>

{{-- Floating CTA --}}
<a href="{{ route('checkout', ['tier' => 'pro']) }}" class="fixed bottom-8 right-8 bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-blue-700 transition transform scale-0" id="floatingEnrollBtn">
    Unlock Pro
</a>

<script>
    // Floating button animation
    const btn = document.getElementById('floatingEnrollBtn');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            btn.classList.add('scale-100');
            btn.classList.remove('scale-0');
        } else {
            btn.classList.add('scale-0');
            btn.classList.remove('scale-100');
        }
    });
</script>
@endsection
