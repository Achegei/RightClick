<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'excerpt'          => 'required|string|max:500',
            'content'          => 'required|string',
            'tier'             => 'required|in:free,pro,premium',
            'series'           => 'nullable|string|max:255',
            'series_order'     => 'nullable|integer|min:1',
            'featured'         => 'nullable|boolean',
            'cta_text'         => 'nullable|string|max:255',
            'cta_link'         => 'nullable|url|max:500',
            'seo_title'        => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:160',
            'publish'          => 'nullable|boolean',
        ]);

        Blog::create([
            'title'            => $data['title'],
            'excerpt'          => $data['excerpt'],
            'content'          => $data['content'], // ✅ HTML allowed
            'tier'             => $data['tier'],
            'series'           => $data['series'] ?? null,
            'series_order'     => $data['series_order'] ?? null,
            'featured'         => $request->boolean('featured'),
            'cta_text'         => $data['cta_text'] ?? null,
            'cta_link'         => $data['cta_link'] ?? null,
            'seo_title'        => $data['seo_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'slug'             => Str::slug($data['title']) . '-' . uniqid(),
            'published_at'     => $request->boolean('publish') ? now() : null,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title'            => 'required|string|max:255',
            'excerpt'          => 'required|string|max:500',
            'content'          => 'required|string',
            'tier'             => 'required|in:free,pro,premium',
            'series'           => 'nullable|string|max:255',
            'series_order'     => 'nullable|integer|min:1',
            'featured'         => 'nullable|boolean',
            'cta_text'         => 'nullable|string|max:255',
            'cta_link'         => 'nullable|url|max:500',
            'seo_title'        => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:160',
            'publish'          => 'nullable|boolean',
        ]);

        $blog->update([
            'title'            => $data['title'],
            'excerpt'          => $data['excerpt'],
            'content'          => $data['content'],
            'tier'             => $data['tier'],
            'series'           => $data['series'] ?? null,
            'series_order'     => $data['series_order'] ?? null,
            'featured'         => $request->boolean('featured'),
            'cta_text'         => $data['cta_text'] ?? null,
            'cta_link'         => $data['cta_link'] ?? null,
            'seo_title'        => $data['seo_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'slug'             => Str::slug($data['title']),
            'published_at'     => $request->boolean('publish')
                ? ($blog->published_at ?? now())
                : null,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog deleted.');
    }
}
