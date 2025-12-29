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
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'tier'        => 'required|in:free,pro,premium',  // ✅ validate tier
        ]);

        Program::create([
            'name'        => $data['name'],
            'description' => $data['description'] ?? null,
            'slug'        => Str::slug($data['name']),
            'tier'        => $data['tier'],                   // ✅ save tier
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
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'tier'        => 'required|in:free,pro,premium',  // ✅ validate tier
        ]);

        $program->update([
            'name'        => $data['name'],
            'description' => $data['description'] ?? null,
            'slug'        => Str::slug($data['name']),
            'tier'        => $data['tier'],                   // ✅ update tier
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
