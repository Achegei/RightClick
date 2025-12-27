<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\BusinessIdea;
use App\Models\SuccessStory;
use App\Models\Video;
use App\Models\Blog;
use App\Models\Program;

class PremiumRoadmapController extends Controller
{
    public function __construct()
    {
        $this->middleware('subscription:premium'); // only users with Premium access
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $availableTiers = ['free', 'pro', 'premium'];

        $lessons = Lesson::whereIn('tier', $availableTiers)->orderBy('order')->paginate(6);
        $businessIdeas = BusinessIdea::whereIn('tier', $availableTiers)->latest()->paginate(6);
        $successStories = SuccessStory::whereIn('tier', $availableTiers)->latest()->paginate(6);
        $videos = Video::whereIn('tier', $availableTiers)->latest()->take(6)->get();
        $blogs = Blog::whereIn('tier', $availableTiers)->whereNotNull('published_at')->latest()->paginate(6);
        $programs = Program::whereIn('tier', $availableTiers)->latest()->paginate(6);

        return view('premium-roadmap', compact(
            'lessons',
            'businessIdeas',
            'successStories',
            'videos',
            'blogs',
            'programs'
        ));
    }
}
