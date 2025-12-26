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
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'nullable|string|max:255',
            'summary'      => 'nullable|string|max:1000',
            'content'      => 'required|string',
            'image'        => 'nullable|image|max:2048',
            'is_premium'   => 'sometimes|boolean',
            'published'    => 'sometimes|boolean',
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('success-stories', 'public');
        }

        SuccessStory::create($data);

        return redirect()->route('admin.success-stories.index')->with('success', 'Success story created.');
    }

    public function edit(SuccessStory $successStory)
    {
        return view('admin.success-stories.edit', compact('successStory'));
    }

    public function update(Request $request, SuccessStory $successStory)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'author'       => 'nullable|string|max:255',
            'summary'      => 'nullable|string|max:1000',
            'content'      => 'required|string',
            'image'        => 'nullable|image|max:2048',
            'is_premium'   => 'sometimes|boolean',
            'published'    => 'sometimes|boolean',
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('success-stories', 'public');
        }

        $successStory->update($data);

        return redirect()->route('admin.success-stories.index')->with('success', 'Success story updated.');
    }

    public function destroy(SuccessStory $successStory)
    {
        $successStory->delete();
        return back()->with('success', 'Success story deleted.');
    }
}
