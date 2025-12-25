<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Blog;
use App\Models\Resource;
use App\Models\Testimonial;
use App\Models\Newsletter;


class FreeRoadmapController extends Controller
{
    public function index(Request $request)
    {
        // Lessons
        $lessons = Lesson::orderBy('order')->get();

        // Blogs – only published, latest first, paginated 5 per page
        $blogs = Blog::whereNotNull('published_at')
                     ->orderBy('published_at', 'desc')
                     ->paginate(5, ['*'], 'blogs-page');

        // Resources – only free, paginated 6 per page
        $resources = Resource::where('is_free', true)
                             ->orderBy('created_at', 'desc')
                             ->paginate(6, ['*'], 'resources-page');

        // Testimonials – latest 5
        $testimonials = Testimonial::where('approved', true)
                                   ->latest()
                                   ->take(5)
                                   ->get();

        return view('free-roadmap-next', compact('lessons', 'blogs', 'resources', 'testimonials'));
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        Newsletter::create($request->only('name', 'email'));

        return back()->with('success', 'Thank you for subscribing! Check your email for the free PDF.');
    }
}
