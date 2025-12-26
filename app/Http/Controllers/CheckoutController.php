<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $tiers = [
        'pro' => ['title' => 'Pro Tier', 'price' => 1999],
        'premium' => ['title' => 'Premium Tier', 'price' => 4999],
    ];

    // Show checkout landing page
    public function show($tier)
    {
        if (!isset($this->tiers[$tier])) abort(404);

        return view('checkout', [
            'tier' => $tier,
            'tierData' => $this->tiers[$tier],
        ]);
    }

    // Show payment form
    public function paymentForm($tier)
    {
        if (!isset($this->tiers[$tier])) abort(404);

        return view('checkout-payment', [
            'tier' => $tier,
            'tierData' => $this->tiers[$tier],
        ]);
    }

    // Handle payment submission
    public function submitPayment(Request $request, $tier)
    {
        if (!isset($this->tiers[$tier])) abort(404);

        $request->validate([
            'payment_method' => 'required|string',
        ]);

        // TODO: integrate MPESA / payment gateway here

        session()->flash('success', "Payment for {$this->tiers[$tier]['title']} initiated successfully!");

        return redirect()->route('checkout.payment', $tier);
    }
}
