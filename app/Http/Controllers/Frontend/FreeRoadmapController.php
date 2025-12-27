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

class FreeRoadmapController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $availableTiers = ['free'];

        if ($user && $user->subscription?->isActive()) {
            $availableTiers[] = $user->subscription->tier; // pro or premium
            if ($user->subscription->tier === 'premium') {
                $availableTiers[] = 'pro'; // premium users get pro content too
            }
        }

        // Fetch content by tier
        $lessons = Lesson::whereIn('tier', $availableTiers)
                         ->orderBy('order')
                         ->paginate(6);

        $businessIdeas = BusinessIdea::whereIn('tier', $availableTiers)
                                     ->orderByDesc('created_at')
                                     ->paginate(6);

        $successStories = SuccessStory::whereIn('tier', $availableTiers)
                                      ->orderByDesc('created_at')
                                      ->paginate(6);

        $videos = Video::whereIn('tier', $availableTiers)
                       ->orderByDesc('created_at')
                       ->take(6)
                       ->get();

        $blogs = Blog::whereIn('tier', $availableTiers)
                     ->whereNotNull('published_at')
                     ->orderByDesc('published_at')
                     ->paginate(6);

        $programs = Program::whereIn('tier', $availableTiers)
                           ->orderByDesc('created_at')
                           ->paginate(6);

        return view('free-roadmap', compact(
            'lessons',
            'businessIdeas',
            'successStories',
            'videos',
            'blogs',
            'programs'
        ));
    }
}
