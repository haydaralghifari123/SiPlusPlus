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

        $serverKey = config('midtrans.server_key');

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

        $transaction = Transaction::where('invoice', $request->order_id)->first();

        if (!$transaction) {
            Log::warning('TRANSACTION NOT FOUND', ['order_id' => $request->order_id]);
            return response()->json(['message' => 'Transaction not found']);
        }

        if (in_array($request->transaction_status, ['capture', 'settlement'])) {
            $transaction->status = 'paid';
        } elseif ($request->transaction_status === 'pending') {
            $transaction->status = 'pending';
        } else {
            $transaction->status = 'failed';
        }

        $transaction->save();

        return response()->json(['message' => 'OK']);
    }
}
