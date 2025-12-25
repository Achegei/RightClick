@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add New Video</h1>

<form action="{{ route('admin.videos.store') }}" method="POST">
    @csrf
    @include('admin.videos.partials.form')

    <button type="submit" class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">Save Video</button>
</form>
@endsection
