<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('MIDTRANS CALLBACK', $request->all());

        // ✅ BENAR
        $serverKey = config('services.midtrans.server_key');

        $signatureKey = hash(
            'sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($signatureKey !== $request->signature_key) {
            Log::warning('MIDTRANS SIGNATURE INVALID');
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // ✅ BENAR (invoice_number)
        $transaction = Transaction::where('invoice_number', $request->order_id)->first();

        if (!$transaction) {
            Log::warning('TRANSACTION NOT FOUND', ['order_id' => $request->order_id]);
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // ✅ STATUS SESUAI DB (INT)
        if (in_array($request->transaction_status, ['capture', 'settlement'])) {
            $transaction->status = 1;
            $transaction->pay_at = now();
        } elseif ($request->transaction_status === 'pending') {
            $transaction->status = 0;
        } else {
            $transaction->status = 2; // failed / expired
        }

        $transaction->save();

        return response()->json(['message' => 'OK']);
    }
}
