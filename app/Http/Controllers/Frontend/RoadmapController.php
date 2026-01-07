<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\BusinessIdea;
use App\Models\UseGeneratedBusinessIdea;
use App\Models\Video;
use App\Models\Blog;
use App\Models\Program;
use App\Models\Payment;

class RoadmapController extends Controller
{
    /**
     * Resolve active user tier from payments table
     */
    private function userTier(): string
    {
        $user = Auth::user();

        if (!$user) {
            return 'free';
        }

        $payment = Payment::where('user_id', $user->id)
            ->where('status', 'paid')
            ->whereNotNull('subscription_started_at')
            ->where('subscription_expires_at', '>', now())
            ->latest('subscription_expires_at')
            ->first();

        if (!$payment) {
            return 'free';
        }

        return $payment->tier;
    }

    /**
     * Determine accessible tiers
     */
    private function availableTiers(): array
    {
        $tier = $this->userTier();

        return match ($tier) {
            'premium' => ['free', 'pro', 'premium'],
            'pro'     => ['free', 'pro'],
            default   => ['free'],
        };
    }

    /**
     * PRO ROADMAP
     */
    public function pro(Request $request)
    {
        if (!in_array($this->userTier(), ['pro', 'premium'])) {
            abort(403, 'Upgrade to Pro to access this roadmap.');
        }

        $tiers = $this->availableTiers();

        return view('roadmaps.pro', [
            'lessons' => Lesson::whereIn('tier', $tiers)
                ->orderBy('order')
                ->paginate(6),
            'businessIdeas' => BusinessIdea::where('status', 'published')
                ->latest()
                ->paginate(6),
            'userbusinessIdeas' => BusinessIdea::where('status', 'published')
                    ->latest()
                    ->take(6)
                    ->get(),

            'videos' => Video::latest()->take(6)->get(),
            'blogs' => Blog::whereNotNull('published_at')->latest('published_at')->paginate(6),
            'programs' => Program::whereIn('tier', ['free', 'pro'])
                ->latest()
                ->paginate(6),
        ]);
    }

    /**
     * PREMIUM ROADMAP
     */
    public function premium(Request $request)
    {
        if ($this->userTier() !== 'premium') {
            abort(403, 'Upgrade to Premium to access this roadmap.');
        }

        return view('roadmaps.premium', [
            'lessons' => Lesson::whereIn('tier', ['free', 'pro', 'premium'])
                ->orderBy('order')
                ->paginate(6),
            'businessIdeas' => BusinessIdea::where('status', 'published')
                ->latest()
                ->paginate(6),
            'successStories' => SuccessStory::where('status', 'published')
                ->latest()
                ->paginate(6),
            'videos' => Video::latest()->take(6)->get(),
            'blogs' => Blog::whereNotNull('published_at')->latest('published_at')->paginate(6),
            'programs' => Program::whereIn('tier', ['free', 'pro', 'premium'])
                ->latest()
                ->paginate(6),
        ]);
    }
}
