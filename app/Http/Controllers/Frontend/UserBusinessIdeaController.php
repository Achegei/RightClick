<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserGeneratedBusinessIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserBusinessIdeaController extends Controller
{
    /**
     * Show all approved or published user-generated business ideas
     */
    public function index()
    {
        $userId = Auth::id() ?? null;

        $ideas = UserGeneratedBusinessIdea::whereIn('status', ['approved', 'published'])
            ->latest()
            ->paginate(12);

        return view('frontend.user-business-ideas.index', compact('ideas', 'userId'));
    }

    /**
     * Show form to submit a new idea
     */
    public function create()
    {
        return view('frontend.user-business-ideas.create');
    }

    /**
     * Store a new user-submitted idea
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'excerpt'        => 'required|string|max:500',
            'content'        => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'tier'           => 'required|in:free,pro,premium',
        ]);

        $idea = new UserGeneratedBusinessIdea();
        $idea->user_id = Auth::id();
        $idea->title = $validated['title'];
        $idea->slug = Str::slug($validated['title']) . '-' . uniqid();
        $idea->excerpt = $validated['excerpt'];
        $idea->content = $validated['content'];
        $idea->tier = $validated['tier'];
        $idea->status = 'pending'; // admin approval required
        $idea->creator_share = 50;

        if ($request->hasFile('featured_image')) {
            $idea->featured_image = $request
                ->file('featured_image')
                ->store('user-generated-business-ideas', 'public');
        }

        $idea->save();

        return redirect()
            ->route('frontend.user-business-ideas.index')
            ->with('success', 'Your idea has been submitted and is awaiting admin review.');
    }

    /**
     * Show a single approved or published idea (slug-based)
     */
    public function show(string $slug)
    {
        $businessIdea = UserGeneratedBusinessIdea::where('slug', $slug)
            ->whereIn('status', ['approved', 'published'])
            ->firstOrFail();

        $canAccess = $businessIdea->tier === 'free' || Auth::check();

        $isOwner = Auth::id() === $businessIdea->user_id;

        return view(
            'frontend.user-business-ideas.show',
            compact('businessIdea', 'canAccess', 'isOwner')
        );
    }

    /**
     * Optional: Allow user to edit their own idea (frontend)
     */
    public function edit(UserGeneratedBusinessIdea $businessIdea)
    {
        $this->authorize('update', $businessIdea); // use policy
        return view('frontend.user-business-ideas.edit', compact('businessIdea'));
    }

    /**
     * Optional: Allow user to update their own idea
     */
    public function update(Request $request, UserGeneratedBusinessIdea $businessIdea)
    {
        $this->authorize('update', $businessIdea);

        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'excerpt'        => 'required|string|max:500',
            'content'        => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'tier'           => 'required|in:free,pro,premium',
        ]);

        $businessIdea->title = $validated['title'];
        $businessIdea->slug = Str::slug($validated['title']) . '-' . uniqid();
        $businessIdea->excerpt = $validated['excerpt'];
        $businessIdea->content = $validated['content'];
        $businessIdea->tier = $validated['tier'];

        if ($request->hasFile('featured_image')) {
            $businessIdea->featured_image = $request
                ->file('featured_image')
                ->store('user-generated-business-ideas', 'public');
        }

        $businessIdea->save();

        return redirect()
            ->route('frontend.user-business-ideas.index')
            ->with('success', 'Your idea has been updated successfully.');
    }

    /**
     * Optional: Allow user to delete their own idea
     */
    public function destroy(UserGeneratedBusinessIdea $businessIdea)
    {
        $this->authorize('delete', $businessIdea);

        $businessIdea->delete();

        return redirect()
            ->route('frontend.user-business-ideas.index')
            ->with('success', 'Your idea has been deleted.');
    }
}
