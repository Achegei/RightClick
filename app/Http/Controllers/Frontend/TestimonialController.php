<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Show approved testimonials
    public function index()
    {
        $testimonials = Testimonial::where('approved', 1)->latest()->get();
        return view('frontend.testimonials.index', compact('testimonials'));
    }

    // Store user-submitted testimonial
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'location'=> 'nullable|string|max:255',
            'content' => 'required|string',
            'avatar'  => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Default: not approved
        $data['approved'] = 0;

        Testimonial::create($data);

        return redirect()->back()->with('success', 'Thank you! Your testimonial is pending approval.');
    }
}
