<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;

class SuccessStoryController extends Controller
{
    /**
     * Show a single success story.
     */
    public function show(SuccessStory $story)
    {
        $canAccess = $story->canAccess(auth()->user());

        return view('frontend.success-stories.show', compact('story', 'canAccess'));
    }

    public function index()
{
    $successStories = SuccessStory::latest()->paginate(9);
    return view('frontend.success-stories.index', compact('successStories'));
}

}
