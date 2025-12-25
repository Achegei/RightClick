<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Blog;
use App\Models\Resource;
use App\Models\Testimonial;

class FreeRoadmapController extends Controller
{
    public function index()
    {
        $lessons = Lesson::orderBy('order')->get();
        $blogs = Blog::whereNotNull('published_at')->latest()->take(5)->get();
        $resources = Resource::where('is_free', 1)->get();
        $testimonials = Testimonial::where('approved', 1)->latest()->take(5)->get();

        return view('frontend.free-roadmap-next', compact('lessons', 'blogs', 'resources', 'testimonials'));
    }
}
