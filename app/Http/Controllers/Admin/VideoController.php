<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(10);
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'youtube_id'  => 'required|string|max:255|unique:videos,youtube_id',
            'description' => 'nullable|string',
            'tier'        => 'required|in:free,pro,premium',
        ]);

        Video::create([
            'title'       => $data['title'],
            'youtube_id'  => $data['youtube_id'],
            'description' => $data['description'] ?? null,
            'tier'        => $data['tier'], // ✅ FIXED
        ]);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video created successfully.');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'youtube_id'  => 'required|string|max:255|unique:videos,youtube_id,' . $video->id,
            'description' => 'nullable|string',
            'tier'        => 'required|in:free,pro,premium',
        ]);

        $video->update([
            'title'       => $data['title'],
            'youtube_id'  => $data['youtube_id'],
            'description' => $data['description'] ?? null,
            'tier'        => $data['tier'], // ✅ FIXED
        ]);

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video updated successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();

        return redirect()
            ->route('admin.videos.index')
            ->with('success', 'Video deleted successfully.');
    }
}
