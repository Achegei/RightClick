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
            'title'   => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'publish' => 'nullable|boolean',
        ]);

        Blog::create([
            'title'        => $data['title'],
            'excerpt'      => $data['excerpt'],
            'content'      => $data['content'],
            'slug'         => Str::slug($data['title']),
            'published_at' => $request->boolean('publish') ? now() : null,
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
            'title'   => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'publish' => 'nullable|boolean',
        ]);

        $blog->update([
            'title'        => $data['title'],
            'excerpt'      => $data['excerpt'],
            'content'      => $data['content'],
            'slug'         => Str::slug($data['title']),
            'published_at' => $request->boolean('publish')
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
