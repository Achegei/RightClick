<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessIdea;
use Illuminate\Http\Request;

class BusinessIdeaController extends Controller
{
    /**
     * Display a listing of business ideas.
     */
    public function index()
    {
        $ideas = BusinessIdea::latest()->paginate(15);

        return view('admin.business-ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new business idea.
     */
    public function create()
    {
        return view('admin.business-ideas.create');
    }

    /**
     * Store a newly created business idea in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'summary'     => 'required|string|max:1000',
            'content'     => 'required|string',
            'is_premium'  => 'sometimes|boolean',
            'published'   => 'sometimes|boolean',
        ]);

        BusinessIdea::create($data);

        return redirect()
            ->route('admin.business-ideas.index')
            ->with('success', 'Business idea created successfully.');
    }

    /**
     * Show the form for editing the specified business idea.
     */
    public function edit(BusinessIdea $businessIdea)
    {
        return view('admin.business-ideas.edit', compact('businessIdea'));
    }

    /**
     * Update the specified business idea in storage.
     */
    public function update(Request $request, BusinessIdea $businessIdea)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'summary'     => 'required|string|max:1000',
            'content'     => 'required|string',
            'is_premium'  => 'sometimes|boolean',
            'published'   => 'sometimes|boolean',
        ]);

        $businessIdea->update($data);

        return redirect()
            ->route('admin.business-ideas.index')
            ->with('success', 'Business idea updated successfully.');
    }

    /**
     * Remove the specified business idea from storage.
     */
    public function destroy(BusinessIdea $businessIdea)
    {
        $businessIdea->delete();

        return back()->with('success', 'Business idea deleted successfully.');
    }
}
