@extends('layouts.admin')

@section('title', 'User Submitted Business Ideas')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-8">

    <h1 class="text-2xl font-bold mb-6">User Submitted Business Ideas</h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3">Title</th>
                    <th class="p-3">User</th>
                    <th class="p-3">Tier</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Submitted</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($ideas as $idea)
                <tr class="border-t align-top">
                    <td class="p-3 font-medium">{{ $idea->title }}</td>
                    <td class="p-3">{{ $idea->user?->name ?? 'Unknown' }}</td>
                    <td class="p-3 capitalize">{{ $idea->tier }}</td>

                    <td class="p-3">
                        @php
                            $statusClasses = match ($idea->status) {
                                'pending'   => 'bg-yellow-100 text-yellow-800',
                                'approved'  => 'bg-blue-100 text-blue-800',
                                'published' => 'bg-green-100 text-green-800',
                                'rejected'  => 'bg-red-100 text-red-800',
                                default     => 'bg-gray-100 text-gray-800',
                            };
                        @endphp
                        <span class="px-2 py-1 rounded text-xs {{ $statusClasses }}">
                            {{ ucfirst($idea->status) }}
                        </span>
                    </td>

                    <td class="p-3">
                        {{ $idea->created_at?->diffForHumans() }}
                    </td>

                    {{-- ACTIONS --}}
                    <td class="p-3">
                        <div class="flex flex-wrap gap-2">

                            {{-- APPROVE / REJECT ONLY WHEN PENDING --}}
                            @if($idea->status === 'pending')
                                <form method="POST"
                                      action="{{ route('admin.user-generated-business-ideas.approve', $idea->id) }}">
                                    @csrf
                                    <button
                                        class="px-3 py-1 bg-green-600 text-white rounded text-xs hover:bg-green-700">
                                        Approve
                                    </button>
                                </form>

                                <form method="POST"
                                      action="{{ route('admin.user-generated-business-ideas.reject', $idea->id) }}">
                                    @csrf
                                    <button
                                        class="px-3 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700">
                                        Reject
                                    </button>
                                </form>
                            @endif

                            {{-- EDIT (ALWAYS AVAILABLE) --}}
                            <a href="{{ route('admin.user-generated-business-ideas.edit', $idea->id) }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded text-xs hover:bg-blue-700">
                                Edit
                            </a>

                            {{-- DELETE (ALWAYS AVAILABLE) --}}
                            <form method="POST"
                                  action="{{ route('admin.user-generated-business-ideas.destroy', $idea->id) }}"
                                  onsubmit="return confirm('Delete this idea permanently?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 bg-gray-800 text-white rounded text-xs hover:bg-black">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">
                        No user-submitted ideas yet.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $ideas->links() }}
    </div>

</div>
@endsection
