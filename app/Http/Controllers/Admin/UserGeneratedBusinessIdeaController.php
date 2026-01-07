<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserGeneratedBusinessIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserGeneratedBusinessIdeaController extends Controller
{
    /**
     * List all user-submitted ideas (pending first)
     */
    public function index()
    {
        $ideas = UserGeneratedBusinessIdea::with('user')
            ->orderByRaw("
                CASE status
                    WHEN 'pending' THEN 1
                    WHEN 'approved' THEN 2
                    WHEN 'published' THEN 3
                    WHEN 'rejected' THEN 4
                END
            ")
            ->latest()
            ->paginate(20);

        return view('admin.user-generated-business-ideas.index', compact('ideas'));
    }

    /**
     * Show the edit form
     */
    public function edit(UserGeneratedBusinessIdea $idea)
    {
        return view('admin.user-generated-business-ideas.edit', compact('idea'));
    }

    /**
     * Update the idea
     */
    public function update(Request $request, UserGeneratedBusinessIdea $idea)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'tier'    => 'required|in:free,pro,premium',
            'status'  => 'required|in:pending,approved,published,rejected',
        ]);

        $idea->update($validated);

        return redirect()
            ->route('admin.user-generated-business-ideas.index')
            ->with('success', 'Idea updated successfully.');
    }

    /**
     * Approve an idea
     */
    public function approve(UserGeneratedBusinessIdea $idea)
    {
        $idea->update([
            'status' => 'approved',
        ]);

        return back()->with('success', 'Idea approved successfully.');
    }

    /**
     * Reject an idea
     */
    public function reject(UserGeneratedBusinessIdea $idea)
    {
        $idea->update([
            'status' => 'rejected',
        ]);

        return back()->with('success', 'Idea rejected.');
    }

    /**
     * Publish directly
     */
    public function publish(UserGeneratedBusinessIdea $idea)
    {
        $idea->update([
            'status' => 'published',
        ]);

        return back()->with('success', 'Idea published.');
    }

    /**
     * Delete spam / abusive ideas
     */
    public function destroy(UserGeneratedBusinessIdea $idea)
    {
        $idea->delete();

        return back()->with('success', 'Idea deleted.');
    }
}
