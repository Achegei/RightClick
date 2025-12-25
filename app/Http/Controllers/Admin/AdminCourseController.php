<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('program')
            ->latest()
            ->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $programs = Program::orderBy('name')->get(); // <-- order by 'name' column
        return view('admin.courses.create', compact('programs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'program_id' => ['required', 'exists:programs,id'],
            'title'      => ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string'],
        ]);

        Course::create($data);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $programs = Program::orderBy('name')->get();
        return view('admin.courses.edit', compact('course', 'programs'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'program_id' => ['required', 'exists:programs,id'],
            'title'      => ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string'],
        ]);

        $course->update($data);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course deleted successfully.');
    }
}
