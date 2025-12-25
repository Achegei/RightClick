<div class="space-y-4">
    <div>
        <label class="font-semibold">Title</label>
        <input name="title"
               value="{{ old('title', $blog->title ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="font-semibold">Excerpt</label>
        <textarea name="excerpt"
                  rows="3"
                  class="w-full border rounded p-2">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
    </div>

    <div>
        <label class="font-semibold">Content</label>
        <textarea name="content"
                  rows="10"
                  class="w-full border rounded p-2">{{ old('content', $blog->content ?? '') }}</textarea>
    </div>

    <div>
        <label>
            <input type="checkbox"
                   name="publish"
                   value="1"
                   {{ old('publish', !empty($blog?->published_at)) ? 'checked' : '' }}>
            Publish now
        </label>
    </div>
</div>
