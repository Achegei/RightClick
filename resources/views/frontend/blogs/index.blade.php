@extends('layouts.front')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold mb-6">All Blogs</h1>

    @foreach($blogs as $blog)
        <div class="mb-8">
            <h2 class="text-2xl font-semibold">
                <a href="{{ route('blogs.show', $blog->slug) }}" class="text-blue-600 hover:underline">
                    {{ $blog->title }}
                </a>
            </h2>
            <p class="text-gray-500">{{ $blog->excerpt }}</p>
        </div>
    @endforeach

    {{ $blogs->links() }} {{-- if you used paginate() --}}
</div>
@endsection
