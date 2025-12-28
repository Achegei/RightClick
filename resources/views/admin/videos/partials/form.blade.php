<div class="space-y-4">

    {{-- Title --}}
    <div>
        <label class="font-semibold">Title</label>
        <input name="title"
               value="{{ old('title', $video->title ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    {{-- YouTube ID --}}
    <div>
        <label class="font-semibold">YouTube ID</label>
        <input name="youtube_id"
               value="{{ old('youtube_id', $video->youtube_id ?? '') }}"
               class="w-full border rounded p-2">
        <small class="text-gray-500">Example: dQw4w9WgXcQ</small>
    </div>

    {{-- Description --}}
    <div>
        <label class="font-semibold">Description</label>
        <textarea name="description"
                  rows="5"
                  class="w-full border rounded p-2">{{ old('description', $video->description ?? '') }}</textarea>
    </div>

    {{-- Tier --}}
    <div>
        <label class="font-semibold">Access Tier</label>
        <select name="tier" class="w-full border rounded p-2">
            @foreach(['free', 'pro', 'premium'] as $tier)
                <option value="{{ $tier }}"
                    {{ old('tier', $video->tier ?? 'free') === $tier ? 'selected' : '' }}>
                    {{ ucfirst($tier) }}
                </option>
            @endforeach
        </select>
    </div>

</div>
