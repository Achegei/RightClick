<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use IntaSend\IntaSendPHP\Collection;

class CheckoutController extends Controller
{
    protected array $tiers = [
        'pro' => ['title' => 'Pro Tier', 'price' => 1999],
        'premium' => ['title' => 'Premium Tier', 'price' => 4999],
    ];

    // Show checkout landing page
    public function show(string $tier)
    {
        abort_unless(isset($this->tiers[$tier]), 404);

        return view('checkout.show', [
            'tier' => $tier,
            'tierData' => $this->tiers[$tier],
        ]);
    }

    // Initiate IntaSend payment (AJAX)
    public function submitPayment(Request $request, string $tier)
    {
        abort_unless(isset($this->tiers[$tier]), 404);

        $request->validate([
            'phone' => 'required|string|max:12',
        ]);

        $user = Auth::user();
        $apiRef = 'user'.$user->id.'-tier-'.$tier.'-'.time();

        $payment = Payment::create([
            'user_id' => $user->id,
            'amount' => $this->tiers[$tier]['price'],
            'provider' => 'intasend',
            'status' => 'pending',
            'api_ref' => $apiRef,
            'metadata' => json_encode(['tier' => $tier])
        ]);

        $collection = new Collection();
        $collection->init([
            'publishable_key' => env('INTASEND_PUBLISHABLE_KEY'),
            'token' => env('INTASEND_SECRET_KEY')
        ]);

        try {
            $response = $collection->mpesa_stk_push(
                $this->tiers[$tier]['price'],
                $request->phone,
                $apiRef
            );

            if (!isset($response->invoice) || !isset($response->invoice->invoice_id)) {
                $payment->update(['status' => 'failed']);
                return response()->json(['status' => 'failed']);
            }

            $payment->update([
                'payment_id' => $response->invoice->invoice_id,
                'payload' => json_encode($response)
            ]);

            return response()->json([
                'status' => 'pending',
                'payment_id' => $payment->id
            ]);

        } catch (\Exception $e) {
            $payment->update(['status' => 'failed']);
            return response()->json(['status' => 'failed']);
        }
    }

    // Polling endpoint for frontend
    public function checkStatus(Payment $payment)
    {
        $collection = new Collection();
        $collection->init([
            'publishable_key' => env('INTASEND_PUBLISHABLE_KEY'),
            'token' => env('INTASEND_SECRET_KEY')
        ]);

        try {
            $response = $collection->status($payment->payment_id);
            if (isset($response->state)) {
                if ($response->state === 'COMPLETE') $payment->update(['status' => 'success']);
                if ($response->state === 'FAILED') $payment->update(['status' => 'failed']);
            }

            return response()->json(['status' => $payment->status]);
        } catch (\Exception $e) {
            return response()->json(['status' => $payment->status]);
        }
    }
}
