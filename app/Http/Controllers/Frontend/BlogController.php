<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // List all published blogs
    public function index()
    {
        $blogs = Blog::whereNotNull('published_at')->latest()->paginate(10);
        return view('frontend.blogs.index', compact('blogs'));
    }

    // Show single blog
    public function show(Blog $blog)
    {
        if (!$blog->published_at) {
            abort(404);
        }
        return view('frontend.blogs.show', compact('blog'));
    }
}
