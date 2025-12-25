<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AccessControlService;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard with programs and courses.
     */
   public function index()
{
    $user = Auth::user();

    // Load programs, courses, lessons
    $programs = $user->programs()
        ->with(['courses.lessons'])
        ->get();

    // Add access flags only (NO progress yet)
    $programs->transform(function ($program) use ($user) {
        $program->courses->transform(function ($course) use ($user) {
            $course->is_unlocked = \App\Services\AccessControlService::userHasCourse($user, $course);

            // TEMP: progress disabled until lesson tracking exists
            $course->progress = 0;

            return $course;
        });

        return $program;
    });

    // Pass account_type to the view
    $accountType = $user->account_type;

    return view('dashboard', compact('user', 'programs', 'accountType'));
}

}
