@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Video</h1>

<form action="{{ route('admin.videos.update', $video) }}" method="POST">
    @csrf
    @method('PUT')
    @include('admin.videos.partials.form')

    <button type="submit" class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded">Update Video</button>
</form>
@endsection
