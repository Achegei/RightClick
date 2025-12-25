<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProgramController extends Controller
{
    public function index()
    {
        $programs = Program::latest()->paginate(10);
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Program::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program created successfully.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $program->update([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program deleted successfully.');
    }
}
