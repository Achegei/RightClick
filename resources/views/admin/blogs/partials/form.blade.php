<div class="space-y-4">

    {{-- Title --}}
    <div>
        <label class="font-semibold">Title</label>
        <input name="title"
               value="{{ old('title', $blog->title ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    {{-- Excerpt --}}
    <div>
        <label class="font-semibold">Excerpt</label>
        <textarea name="excerpt"
                  rows="3"
                  class="w-full border rounded p-2">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
    </div>

    {{-- Content --}}
    <div>
        <label class="font-semibold">Content</label>
        <textarea name="content"
                  rows="10"
                  class="w-full border rounded p-2">{{ old('content', $blog->content ?? '') }}</textarea>
    </div>

    {{-- Tier --}}
    <div>
        <label class="font-semibold">Tier</label>
        <select name="tier" class="w-full border rounded p-2">
            @foreach(['free', 'pro', 'premium'] as $tier)
                <option value="{{ $tier }}"
                    {{ old('tier', $blog->tier ?? 'free') === $tier ? 'selected' : '' }}>
                    {{ ucfirst($tier) }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Publish --}}
    <div>
        <label class="inline-flex items-center">
            <input type="checkbox"
                   name="publish"
                   value="1"
                   {{ old('publish', !empty($blog?->published_at)) ? 'checked' : '' }}>
            <span class="ml-2">Publish now</span>
        </label>
    </div>

</div>
