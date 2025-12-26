<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class WebhookController extends Controller
{
    public function handleIntaSend(Request $request)
    {
        $data = $request->all();
        $invoiceId = $data['invoice_id'] ?? null;
        $apiRef = $data['api_ref'] ?? null;
        $state = strtolower($data['state'] ?? '');

        if (!$invoiceId || !$apiRef) return response('ok', 200);

        $payment = Payment::where('api_ref', $apiRef)
            ->orWhere('payment_id', $invoiceId)
            ->first();

        if (!$payment) {
            $payment = Payment::create([
                'user_id' => intval(explode('-', $apiRef)[0] ?? 0),
                'amount' => $data['amount'] ?? 0,
                'provider' => 'intasend',
                'payment_id' => $invoiceId,
                'api_ref' => $apiRef,
                'status' => 'pending',
                'payload' => json_encode($data)
            ]);
        }

        if ($state === 'complete') $payment->update(['status' => 'success', 'payload' => json_encode($data)]);
        if ($state === 'failed') $payment->update(['status' => 'failed', 'payload' => json_encode($data)]);

        return response('ok', 200);
    }
}
