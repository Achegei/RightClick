<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Tier;
use IntaSend\IntaSendPHP\Checkout;
use IntaSend\IntaSendPHP\Customer;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page for a tier
     */
    public function show(Request $request, string $tierSlug)
    {
        $tier = Tier::where('slug', $tierSlug)->firstOrFail();
        $sourceBlogId = $request->query('source_blog'); // ✅ now $request exists

        return view('checkout.show', [
            'tier'          => $tierSlug,
            'tierData'      => $tier,
            'sourceBlogId'  => $sourceBlogId,
        ]);
    }

    /**
     * Handle payment submission
     */
    public function pay(Request $request, string $tierSlug)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $tier = Tier::where('slug', $tierSlug)->firstOrFail();
        $sourceBlogId = $request->input('source_blog'); // ✅ get source_blog from request if any

        $apiRef = "tier-user{$user->id}-{$tierSlug}-" . time();

        // Create local payment record
        $payment = Payment::create([
            'user_id'        => $user->id,
            'amount'         => $tier->price,
            'payment_provider'=> 'intasend',
            'status'         => 'pending',
            'api_ref'        => $apiRef,
            'reference'      => 'REF-' . strtoupper(uniqid()),
            'tier'           => $tierSlug,
            'source_blog_id' => $sourceBlogId,
        ]);

        // Build Customer object
        $customer = new Customer();
        $customer->first_name = $user->name;
        $customer->last_name  = $user->name;
        $customer->email      = $user->email;
        $customer->country    = 'KE';

        // Initialize IntaSend checkout
        $checkout = new Checkout();
        $checkout->init([
            'token'           => config('services.intasend.secret'),
            'publishable_key' => config('services.intasend.publishable'),
            'test'            => config('services.intasend.test'),
        ]);

        $host = config('app.url');
        $redirectUrl = $host . route('checkout.complete', ['tier' => $tierSlug], false);

        // Create hosted checkout
        $response = $checkout->create(
            $tier->price,
            'KES',
            $customer,
            $host,
            $redirectUrl,
            $apiRef,
            null,
            "M-PESA"
        );

        // Update payment with IntaSend response
        $payment->update([
            'payment_id' => $response->invoice->invoice_id ?? null,
            'payload'    => json_encode($response),
        ]);

        // Redirect user to IntaSend checkout
        return redirect($response->url);
    }

    /**
     * IntaSend redirect after payment
     */
    public function complete(string $tierSlug)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Find latest payment for this tier
        $payment = Payment::where('user_id', $user->id)
            ->where('tier', $tierSlug)
            ->latest()
            ->first();

        if (!$payment || $payment->status !== 'pending') {
            abort(404, 'Payment not found or already completed.');
        }

        // Mark payment as successful
        $payment->update([
            'status'                  => 'paid',
            'paid_at'                 => now(),
            'subscription_started_at' => now(),
            'subscription_expires_at' => now()->addYear(),
        ]);

        // Redirect based on tier
        return match ($tierSlug) {
            'premium' => redirect()->route('roadmap.premium'),
            'pro'     => redirect()->route('roadmap.pro'),
            default   => redirect()->route('free-roadmap'),
        };
    }
}
