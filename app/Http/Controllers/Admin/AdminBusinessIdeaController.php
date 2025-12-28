<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessIdea;
use Illuminate\Http\Request;

class AdminBusinessIdeaController extends Controller
{
    public function index()
    {
        $ideas = BusinessIdea::latest()->paginate(15);
        return view('admin.business-ideas.index', compact('ideas'));
    }

    public function create()
    {
        return view('admin.business-ideas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:1000',
            'content' => 'required|string',
            'is_premium' => 'sometimes|boolean',
            'published' => 'sometimes|boolean',
        ]);

        BusinessIdea::create($data);

        return redirect()->route('admin.business-ideas.index')
                         ->with('success', 'Business idea created successfully.');
    }

    public function edit($id)
    {
        $businessIdea = BusinessIdea::findOrFail($id);
        return view('admin.business-ideas.edit', compact('businessIdea'));
    }

    public function update(Request $request, $id)
    {
        $businessIdea = BusinessIdea::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string|max:1000',
            'content' => 'required|string',
            'is_premium' => 'sometimes|boolean',
            'published' => 'sometimes|boolean',
        ]);

        $businessIdea->update($data);

        return redirect()->route('admin.business-ideas.index')
                         ->with('success', 'Business idea updated successfully.');
    }

    public function destroy($id)
    {
        $businessIdea = BusinessIdea::findOrFail($id);
        $businessIdea->delete();

        return back()->with('success', 'Business idea deleted successfully.');
    }
}
