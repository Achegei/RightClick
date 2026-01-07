<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Payment;
use App\Models\Tier;
use App\Models\Blog; // 👈 assuming you have blogs
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /* =============================
         * USERS
         * ============================= */
        $totalUsers = User::count();

        $paidUserIds = Payment::where('status', 'paid')
            ->distinct()
            ->pluck('user_id');

        $freeUsers = User::whereNotIn('id', $paidUserIds)->count();

        /* =============================
         * USERS PER TIER (PAYMENTS = TRUTH)
         * ============================= */
        $usersPerTier = Payment::where('status', 'paid')
            ->selectRaw('tier, COUNT(DISTINCT user_id) as total')
            ->groupBy('tier')
            ->pluck('total', 'tier')
            ->toArray();

        /* =============================
         * REVENUE
         * ============================= */
        $totalRevenue = Payment::where('status', 'paid')->sum('amount');

        $monthlyRevenue = Payment::where('status', 'paid')
            ->whereMonth('paid_at', now()->month)
            ->whereYear('paid_at', now()->year)
            ->sum('amount');

        $revenueByTier = Payment::where('status', 'paid')
            ->selectRaw('tier, SUM(amount) as total')
            ->groupBy('tier')
            ->pluck('total', 'tier')
            ->toArray();

        /* =============================
         * TIERS (DISPLAY PURPOSE ONLY)
         * ============================= */
        $tiers = Tier::orderBy('price')->get();

        /* =============================
         * BLOG ANALYTICS (RESTORED)
         * ============================= */
        $totalBlogs = Blog::count();

        $totalBlogViews = Blog::sum('views');

        $topBlogs = Blog::orderByDesc('views')
            ->limit(5)
            ->get();

        /* =============================
         * CHART DATA (READY FOR JS)
         * ============================= */
        $chartUsersByTier = [
            'labels' => array_keys($usersPerTier),
            'data'   => array_values($usersPerTier),
        ];

        $chartRevenueByTier = [
            'labels' => array_keys($revenueByTier),
            'data'   => array_values($revenueByTier),
        ];

        return view('admin.dashboard', compact(
            'totalUsers',
            'freeUsers',
            'totalRevenue',
            'monthlyRevenue',
            'tiers',
            'usersPerTier',
            'revenueByTier',
            'totalBlogs',
            'totalBlogViews',
            'topBlogs',
            'chartUsersByTier',
            'chartRevenueByTier'
        ));
    }
}
