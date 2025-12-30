@extends('layouts.front')

@section('title', $lesson->title)

@section('content')
<div class="max-w-4xl mx-auto py-12">

    {{-- Back --}}
    <div class="mb-6">
        <a href="{{ url()->previous() ?? route('programs.index') }}"
           class="text-sm text-gray-600 hover:text-gray-900 inline-flex items-center">
            ← Back
        </a>
    </div>

    {{-- Lesson Title --}}
    <h1 class="text-4xl font-extrabold text-gray-900 mb-6">
        {{ $lesson->title }}
    </h1>

    {{-- ACCESS GRANTED --}}
    @if($canAccess)

        {{-- Lesson Content --}}
        <div class="prose max-w-none mb-8">
            {!! $lesson->content !!}
        </div>

        {{-- Action Step --}}
        @if(!empty($lesson->action_step))
            <div class="mt-8 p-6 bg-indigo-50 border-l-4 border-indigo-500 rounded-xl">
                <p class="font-semibold text-indigo-900 mb-1">💡 Action Step</p>
                <p class="text-indigo-800">
                    {{ $lesson->action_step }}
                </p>
            </div>
        @endif

        {{-- Navigation --}}
        <div class="flex justify-between items-center mt-12">
            <a href="{{ url()->previous() ?? route('programs.index') }}"
               class="px-5 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300">
                ← Back
            </a>

            @isset($nextLesson)
                <a href="{{ route('lessons.show', $nextLesson->slug) }}"
                   class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Next → {{ $nextLesson->title }}
                </a>
            @endisset
        </div>

    {{-- ACCESS DENIED --}}
    @else

        <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm text-center">
            <p class="text-gray-700 text-lg mb-6">
                This lesson is part of the
                <strong class="capitalize">{{ $lesson->tier }}</strong> program.
            </p>

            <a href="{{ route('checkout.show', ['tier' => $lesson->tier]) }}"
               class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:bg-indigo-700">
                Unlock {{ ucfirst($lesson->tier) }}
            </a>
        </div>

    @endif

</div>
@endsection
