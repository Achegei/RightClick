@extends('layouts.admin')

@section('title', 'Create Blog')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Blog</h1>

    <form method="POST" action="{{ route('admin.blogs.store') }}">
        @csrf

        @include('admin.blogs.partials.form')
        <button class="bg-blue-600 text-white px-6 py-2 rounded mt-4">
            Save Blog
        </button>
    </form>
</div>
@endsection
