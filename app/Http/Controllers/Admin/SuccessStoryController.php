<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::latest()->paginate(15);
        return view('admin.success-stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.success-stories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'status' => 'required',
            'tier' => 'required',
        ]);

        $story = new SuccessStory();
        $story->title = $request->title;
        $story->excerpt = $request->excerpt;
        $story->content = $request->content;
        $story->status = $request->status;
        $story->tier = $request->tier;
        $story->save(); // slug not needed for admin

        return redirect()->route('admin.success-stories.index')
                         ->with('success', 'Story created!');
    }

    // Fetch by ID instead of route-model binding
    public function edit($id)
    {
        $successStory = SuccessStory::findOrFail($id);
        return view('admin.success-stories.edit', compact('successStory'));
    }

    public function update(Request $request, $id)
    {
        $successStory = SuccessStory::findOrFail($id);

        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'excerpt'       => 'nullable|string|max:1000',
            'content'       => 'required|string',
            'featured_image'=> 'nullable|image|max:2048',
            'status'        => 'nullable|in:published,draft',
            'tier'          => 'required|in:free,pro,premium',
        ]);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')
                                             ->store('success-stories', 'public');
        }

        $successStory->update($data);

        return redirect()->route('admin.success-stories.index')
                         ->with('success', 'Success story updated.');
    }

    public function destroy($id)
    {
        $successStory = SuccessStory::findOrFail($id);
        $successStory->delete();

        return back()->with('success', 'Success story deleted.');
    }
}
