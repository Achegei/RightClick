<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;

class PricingController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        // Fetch programs if user is logged in
        $programs = $user 
            ? Program::with(['courses.lessons'])->get() 
            : collect();

        return view('pages.pricing', compact('user', 'programs'));
    }
}
