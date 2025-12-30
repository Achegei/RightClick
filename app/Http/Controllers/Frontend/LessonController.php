<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        // Only published lessons
        abort_if($lesson->status !== 'published', 404);

        $user = Auth::user();
        $canAccess = false;

        /*
        |--------------------------------------------------------------------------
        | FREE LESSONS
        |--------------------------------------------------------------------------
        */
        if ($lesson->tier === 'free') {
            $canAccess = true;
        }

        /*
        |--------------------------------------------------------------------------
        | PRO & PREMIUM LESSONS
        |--------------------------------------------------------------------------
        */
        if (in_array($lesson->tier, ['pro', 'premium'])) {

            // Must be logged in
            if (! $user) {
                return redirect()->route('login');
            }

            // Find latest PAID subscription for this tier
            $payment = Payment::where('user_id', $user->id)
                ->where('tier', $lesson->tier)
                ->where('status', 'paid')
                ->whereNotNull('subscription_expires_at')
                ->orderByDesc('subscription_expires_at')
                ->first();

            // Check subscription validity
            if (
                $payment &&
                Carbon::now()->lt(Carbon::parse($payment->subscription_expires_at))
            ) {
                $canAccess = true;
            } else {
                // Subscription missing or expired → send to checkout
                return redirect()
                    ->route('checkout.show', ['tier' => $lesson->tier])
                    ->with('error', 'Your subscription has expired. Please renew to continue.');
            }
        }

        /*
        |--------------------------------------------------------------------------
        | OPTIONAL: NEXT / PREVIOUS LESSON
        |--------------------------------------------------------------------------
        */
        $nextLesson = Lesson::where('course_id', $lesson->course_id)
            ->where('order', '>', $lesson->order)
            ->where('status', 'published')
            ->orderBy('order')
            ->first();

        return view('frontend.lessons.show', compact(
            'lesson',
            'canAccess',
            'nextLesson'
        ));
    }
}
