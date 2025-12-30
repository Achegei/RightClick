<div class="space-y-4">

    {{-- Title --}}
    <div>
        <label class="font-semibold">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $blog->title ?? '') }}"
               class="w-full border rounded p-2"
               placeholder="Enter blog title">
    </div>

    {{-- Excerpt --}}
    <div>
        <label class="font-semibold">Excerpt</label>
        <textarea name="excerpt"
                  rows="3"
                  class="w-full border rounded p-2"
                  placeholder="Short summary">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
    </div>

    {{-- Content --}}
    <div>
        <label class="font-semibold">Content (HTML Allowed)</label>
        <textarea name="content"
                  rows="12"
                  class="w-full border rounded p-2"
                  placeholder="Full blog content (HTML allowed)">{{ old('content', $blog->content ?? '') }}</textarea>
        <p class="text-gray-500 text-sm mt-1">You can use <code>&lt;p&gt;</code>, <code>&lt;ul&gt;</code>, <code>&lt;strong&gt;</code> etc.</p>
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

    {{-- Series --}}
    <div>
        <label class="font-semibold">Series (Optional)</label>
        <input type="text" name="series"
               value="{{ old('series', $blog->series ?? '') }}"
               class="w-full border rounded p-2"
               placeholder="e.g. Online Income 2026">
    </div>

    {{-- Series Order --}}
    <div>
        <label class="font-semibold">Series Order</label>
        <input type="number" name="series_order"
               value="{{ old('series_order', $blog->series_order ?? 1) }}"
               class="w-full border rounded p-2"
               min="1">
    </div>

    {{-- Featured --}}
    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="featured"
                   value="1"
                   {{ old('featured', $blog->featured ?? false) ? 'checked' : '' }}>
            <span class="ml-2">Mark as Featured</span>
        </label>
    </div>

    {{-- CTA Text --}}
    <div>
        <label class="font-semibold">CTA Text (Optional)</label>
        <input type="text" name="cta_text"
               value="{{ old('cta_text', $blog->cta_text ?? '') }}"
               class="w-full border rounded p-2"
               placeholder="e.g. Join Pro for full access">
    </div>

    {{-- CTA Link --}}
    <div>
        <label class="font-semibold">CTA Link (Optional)</label>
        <input type="url" name="cta_link"
               value="{{ old('cta_link', $blog->cta_link ?? '') }}"
               class="w-full border rounded p-2"
               placeholder="https://example.com/pro">
    </div>

    {{-- SEO Title --}}
    <div>
        <label class="font-semibold">SEO Title (Optional)</label>
        <input type="text" name="seo_title"
               value="{{ old('seo_title', $blog->seo_title ?? '') }}"
               class="w-full border rounded p-2"
               placeholder="Appears in search engines">
    </div>

    {{-- Meta Description --}}
    <div>
        <label class="font-semibold">Meta Description (Optional)</label>
        <textarea name="meta_description"
                  rows="2"
                  class="w-full border rounded p-2"
                  placeholder="150-160 characters">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
    </div>

    {{-- Publish --}}
    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="publish" value="1"
                   {{ old('publish', !empty($blog?->published_at)) ? 'checked' : '' }}>
            <span class="ml-2">Publish now</span>
        </label>
    </div>

</div>
