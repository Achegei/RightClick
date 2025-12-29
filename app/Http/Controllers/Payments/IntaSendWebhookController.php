<?php

namespace App\Http\Controllers\Payments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentLog;

class IntaSendWebhookController extends Controller
{
    /**
     * Handle IntaSend webhook notifications
     */
    public function handle(Request $request)
    {
        $data = $request->all();

        $invoiceId = $data['invoice_id'] ?? null;
        $apiRef    = $data['api_ref'] ?? null;
        $state     = strtolower($data['state'] ?? '');
        $paid      = $data['paid'] ?? false;

        // Log incoming webhook for debugging
        PaymentLog::create([
            'invoice_id' => $invoiceId,
            'api_ref'    => $apiRef,
            'state'      => $state,
            'payload'    => json_encode($data),
        ]);

        if (!$invoiceId || !$apiRef) {
            return response('ok', 200);
        }

        // Find the payment record
        $payment = Payment::where('api_ref', $apiRef)
            ->orWhere('payment_id', $invoiceId)
            ->first();

        if (!$payment || $payment->status === 'success') {
            return response('ok', 200);
        }

        // Only process completed payments
        if (!$paid && $state !== 'complete') {
            return response('ok', 200);
        }

        // Mark payment as successful
        $payment->update([
            'status'  => 'success',
            'payload' => json_encode($data),
        ]);

        // Unlock content / update user account type
        $user = $payment->user;
        $meta = json_decode($payment->metadata, true);

        if ($user && isset($meta['tier'])) {
            // Update account_type dynamically based on tier slug
            $user->update(['account_type' => $meta['tier']]);
        }

        return response('ok', 200);
    }
}
