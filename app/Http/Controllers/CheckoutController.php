<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function show($tier)
    {
        $tiers = [
            'pro' => [
                'title' => 'Pro Tier',
                'price' => 1999,
            ],
            'premium' => [
                'title' => 'Premium Tier',
                'price' => 4999,
            ],
        ];

        if (!isset($tiers[$tier])) {
            abort(404);
        }

        return view('checkout', [
            'tier' => $tier,
            'tierData' => $tiers[$tier],
        ]);
    }
}
