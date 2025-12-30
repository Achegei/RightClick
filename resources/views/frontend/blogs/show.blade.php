@extends('layouts.front')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $blog->title }}</h1>
    <p class="text-gray-500 mb-6">
        {{ $blog->published_at ? $blog->published_at->format('F j, Y') : $blog->created_at->format('F j, Y') }}
    </p>

        <div class="prose prose-lg text-gray-700">
        {!! $blog->content !!}
    </div>


    {{-- CTA Button --}}
    @if($blog->cta_text && $blog->cta_link)
        <div class="mt-8">
            <a href="{{ route('blogs.cta', $blog->id) }}"
               class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition">
               {{ $blog->cta_text }}
            </a>
        </div>
    @endif

    <a href="{{ route('blogs.index') }}" class="inline-block mt-8 text-blue-600 hover:underline">
        ← Back to all blogs
    </a>
</div>
@endsection
