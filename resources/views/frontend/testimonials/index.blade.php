@extends('layouts.front') {{-- your frontend layout --}}

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-4xl font-extrabold text-gray-900 mb-8 text-center">
        What Our Users Say
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($testimonials as $testimonial)
            <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col justify-between hover:shadow-xl transition-shadow duration-300">
                <div class="mb-4">
                    <p class="text-gray-700 text-base leading-relaxed">
                        "{{ $testimonial->content }}"
                    </p>
                </div>
                <div class="mt-auto pt-4 border-t border-gray-100">
                    <p class="text-gray-900 font-semibold">{{ $testimonial->name }}</p>
                    @if($testimonial->location)
                        <p class="text-gray-500 text-sm">{{ $testimonial->location }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    @if($testimonials->isEmpty())
        <p class="text-center text-gray-500 mt-12">
            No testimonials yet. Be the first to share your experience!
        </p>
    @endif
</div>
@endsection
