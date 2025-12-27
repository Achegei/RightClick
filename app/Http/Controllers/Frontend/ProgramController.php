<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;

class ProgramController extends Controller
{
    // List all programs
    public function index()
    {
        $programs = Program::orderBy('created_at', 'desc')->get();
        return view('frontend.programs.index', compact('programs'));
    }

    // Show a single program
    public function show($slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();
        return view('frontend.programs.show', compact('program'));
    }
}
