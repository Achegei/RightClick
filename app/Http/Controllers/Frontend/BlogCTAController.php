<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogCTAController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'cta_type' => 'required|string',
        ]);

        // 🔒 Optional: ensure blog is published
        if (!$blog->published_at) {
            abort(404);
        }

        // 📊 Track CTA click
        $blog->ctaEvents()->create([
            'user_id' => auth()->id(),
            'cta_type' => $request->cta_type,
        ]);

        // 🚀 Redirect based on CTA intent
        return redirect()->route('checkout.show', [
            'tier' => $request->cta_type === 'join_premium'
                ? 'premium'
                : 'pro',
        ]);
    }
}
