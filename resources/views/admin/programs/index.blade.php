@extends('layouts.admin') {{-- assuming you have a master admin layout --}}

@section('title', 'Programs')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Programs</h1>
        <a href="{{ route('admin.programs.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold transition">
           + Create Program
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search --}}
    <div class="mb-4">
        <form method="GET" action="{{ route('admin.programs.index') }}">
            <input type="text" name="search" placeholder="Search programs..."
                   class="border border-gray-300 rounded px-3 py-2 w-full md:w-1/3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </form>
    </div>

    {{-- Programs Table --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($programs as $program)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration + ($programs->currentPage()-1)*$programs->perPage() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold text-gray-900">{{ $program->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ Str::limit($program->description, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <a href="{{ route('admin.programs.edit', $program) }}" 
                               class="text-blue-600 hover:text-blue-800 font-semibold mr-2">Edit</a>
                            <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this program?');"
                                        class="text-red-600 hover:text-red-800 font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">No programs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $programs->links() }}
    </div>
</div>
@endsection
