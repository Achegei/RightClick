<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a new comment or reply
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'commentable_type' => 'required|string',
            'commentable_id'   => 'required|integer',
            'content'          => 'required|string|max:2000',
            'parent_id'        => 'nullable|exists:comments,id',
        ]);

        // 🔒 Prevent deep nesting (max depth = 2)
        if (!empty($validated['parent_id'])) {
            $parent = Comment::findOrFail($validated['parent_id']);

            if ($parent->parent_id !== null) {
                abort(403, 'Reply depth limit reached.');
            }
        }

        Comment::create([
            'user_id'          => auth()->id(),
            'commentable_type' => $validated['commentable_type'],
            'commentable_id'   => $validated['commentable_id'],
            'content'          => $validated['content'],
            'parent_id'        => $validated['parent_id'] ?? null,
            'approved'         => false, // moderation required
        ]);

        return back()->with(
            'success',
            'Comment submitted and awaiting approval.'
        );
    }
}
