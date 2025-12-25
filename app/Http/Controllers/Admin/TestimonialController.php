<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    // Admin: List testimonials (paginated)
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    // User: Show testimonial submission form (frontend)
    public function create()
    {
        return view('testimonials.create'); // public-facing view
    }

    // Store a new testimonial (user-submitted or admin-created)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'content' => 'required|string',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // All user-submitted testimonials are pending approval
        $data['approved'] = false;

        Testimonial::create($data);

        return redirect()->back()->with('success', 'Thank you! Your testimonial will be reviewed by admin.');
    }

    // Admin: Edit a testimonial
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    // Admin: Update a testimonial
    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'content' => 'required|string',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated.');
    }

    // Admin: Delete a testimonial
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }

    // Admin: Toggle approval status
    public function toggleApproval(Testimonial $testimonial)
    {
        $testimonial->approved = !$testimonial->approved;
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial approval toggled.');
    }
}
