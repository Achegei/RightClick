@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow">
            Add Testimonial
        </a>
    </div>

    <div class="grid gap-6">
        @foreach($testimonials as $testimonial)
        <div class="bg-white shadow-md rounded-2xl p-6 border border-gray-200 flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="flex items-center space-x-4">
                @if($testimonial->avatar)
                    <img src="{{ asset('storage/' . $testimonial->avatar) }}" alt="Avatar" class="w-16 h-16 rounded-full object-cover border border-gray-200">
                @else
                    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center text-gray-400 font-bold">
                        {{ strtoupper(substr($testimonial->name, 0, 2)) }}
                    </div>
                @endif
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">{{ $testimonial->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $testimonial->location ?? '-' }}</p>
                </div>
            </div>

            <div class="mt-4 md:mt-0 md:flex-1 md:ml-6">
                <p class="text-gray-700">{{ Str::limit($testimonial->content, 100) }}</p>
            </div>

            <div class="mt-4 md:mt-0 flex items-center space-x-3">
                {{-- Approval Toggle --}}
                <form action="{{ route('admin.testimonials.toggleApproval', $testimonial) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-3 py-1 rounded-lg text-sm font-medium {{ $testimonial->approved ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-700' }}">
                        {{ $testimonial->approved ? 'Approved' : 'Pending' }}
                    </button>
                </form>

                {{-- Edit Button --}}
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="px-3 py-1 rounded-lg text-sm font-medium bg-yellow-100 text-yellow-800 hover:bg-yellow-200">Edit</a>

                {{-- Delete Button --}}
                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-3 py-1 rounded-lg text-sm font-medium bg-red-100 text-red-800 hover:bg-red-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $testimonials->links('pagination::tailwind') }}
    </div>
</div>
@endsection
