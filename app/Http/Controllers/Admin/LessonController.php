<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::latest()->paginate(20);
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',

            'phase'       => 'required|string|max:100',
            'lesson_type' => 'required|string|max:100',
            'action_step' => 'nullable|string',
            'outcome'     => 'nullable|string',

            'tier'        => 'required|in:free,pro,premium',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:draft,published',
        ]);

        Lesson::create($data);

        return redirect()
            ->route('admin.lessons.index')
            ->with('success', 'Lesson created successfully.');
    }

    public function edit($id)
    {
        $lesson  = Lesson::findOrFail($id);
        $courses = Course::all();

        return view('admin.lessons.edit', compact('lesson', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $data = $request->validate([
            'course_id'   => 'required|exists:courses,id',
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',

            'phase'       => 'required|string|max:100',
            'lesson_type' => 'required|string|max:100',
            'action_step' => 'nullable|string',
            'outcome'     => 'nullable|string',

            'tier'        => 'required|in:free,pro,premium',
            'order'       => 'required|integer|min:0',
            'status'      => 'required|in:draft,published',
        ]);

        $lesson->update($data);

        return redirect()
            ->route('admin.lessons.index')
            ->with('success', 'Lesson updated successfully.');
    }

    public function destroy($id)
    {
        Lesson::findOrFail($id)->delete();

        return back()->with('success', 'Lesson deleted.');
    }
}
