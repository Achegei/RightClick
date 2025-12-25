<div class="space-y-4">
    <div>
        <label class="font-semibold">Title</label>
        <input name="title"
               value="{{ old('title', $video->title ?? '') }}"
               class="w-full border rounded p-2">
    </div>

    <div>
        <label class="font-semibold">YouTube ID</label>
        <input name="youtube_id"
               value="{{ old('youtube_id', $video->youtube_id ?? '') }}"
               class="w-full border rounded p-2">
        <small class="text-gray-500">Example: dQw4w9WgXcQ</small>
    </div>

    <div>
        <label class="font-semibold">Description</label>
        <textarea name="description"
                  rows="5"
                  class="w-full border rounded p-2">{{ old('description', $video->description ?? '') }}</textarea>
    </div>
</div>
