<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Services\AccessControlService;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    // List all programs
    public function index()
    {
        $programs = Program::orderBy('created_at', 'desc')->get();
        return view('frontend.programs.index', compact('programs'));
    }

    // Show a single program (SUBSCRIPTION-AWARE)
    public function show(string $slug)
    {
        $program = Program::where('slug', $slug)->firstOrFail();

        $user = Auth::user();
        $hasAccess = false;

        // Free programs are always accessible
        if ($program->tier === 'free') {
            $hasAccess = true;
        }
        // Paid programs → check active subscription
        elseif ($user) {
            $hasAccess = AccessControlService::userHasProgram($user, $program->tier);
        }

        return view('frontend.programs.show', compact(
            'program',
            'hasAccess'
        ));
    }
}
