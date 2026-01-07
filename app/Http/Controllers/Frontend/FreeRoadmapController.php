<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\BusinessIdea;
use App\Models\UserGeneratedBusinessIdea;
use App\Models\Video;
use App\Models\Blog;
use App\Models\Program;

class FreeRoadmapController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        /**
         * Determine accessible tiers
         */
        $availableTiers = ['free'];

        if ($user && $user->subscription?->isActive()) {
            $availableTiers[] = $user->subscription->tier;

            if ($user->subscription->tier === 'premium') {
                $availableTiers[] = 'pro';
            }
        }

        /**
         * Lessons (free + subscribed tiers)
         */
        $lessons = Lesson::whereIn('tier', $availableTiers)
            ->orderBy('order')
            ->paginate(6);

        /**
         * Business Ideas (PUBLISHED ONLY)
         * Unlock logic handled in model via canAccess()
         */
        $businessIdeas = BusinessIdea::where('status', 'published')
            ->latest()
            ->paginate(6);

        /**
         * Success Stories (published)
         */
        $userGeneratedBusinessIdeas = UserGeneratedBusinessIdea::where('status', 'published')
        ->where('tier', 'free')
        ->latest()
        ->take(6)
        ->get();



        /**
         * Videos (latest 6)
         */
        $videos = Video::latest()
            ->take(6)
            ->get();

        /**
         * Blogs (published)
         */
        $blogs = Blog::whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(6);

        /**
         * Programs
         */
        $programs = Program::latest()
            ->paginate(6);

        return view('free-roadmap', compact(
            'lessons',
            'businessIdeas',
            'userGeneratedBusinessIdeas',
            'videos',
            'blogs',
            'programs'
        ));
    }
}
