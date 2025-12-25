@extends('layouts.front') {{-- your frontend layout --}}

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $blog->title }}</h1>
    <p class="text-gray-500 mb-6">{{ $blog->published_at ? $blog->published_at->format('F j, Y') : $blog->created_at->format('F j, Y') }}</p>

    <div class="prose prose-lg text-gray-700">
        {!! nl2br(e($blog->content)) !!}
    </div>

    <a href="{{ route('blogs.index') }}" class="inline-block mt-8 text-blue-600 hover:underline">
        ← Back to all blogs
    </a>
</div>
@endsection
