<div class="space-y-2">
    <a href="{{ route('checkout.show', ['tier' => $tier, 'content_type' => $contentType ?? null, 'content_id' => $contentId ?? null]) }}"
       class="inline-flex items-center justify-center
              bg-indigo-600 text-white px-6 py-3
              rounded-lg font-semibold
              shadow-md hover:shadow-lg
              transform transition-all duration-300
              hover:scale-105 hover:bg-indigo-700">
        Upgrade to {{ ucfirst($tier) }} →
    </a>

    <span class="block text-sm text-gray-600">
        @if($contentType)
            Requires {{ ucfirst($tier) }} {{ ucfirst(str_replace('_', ' ', $contentType)) }}
        @else
            Requires {{ ucfirst($tier) }} access
        @endif
    </span>
</div>
