<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature\Transaction;
use App\Models\Feature\UserCourse;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        // 1️⃣ LOG CALLBACK (WAJIB UNTUK DEBUG)
        Log::info('MIDTRANS CALLBACK', $request->all());

        // 2️⃣ AMBIL SERVER KEY DARI services.php
        $serverKey = config('services.midtrans.server_key');

        // 3️⃣ VALIDASI SIGNATURE KEY
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

        // 4️⃣ CARI TRANSAKSI BERDASARKAN INVOICE
        $transaction = Transaction::where('invoice_number', $request->order_id)->first();

        if (!$transaction) {
            Log::warning('TRANSACTION NOT FOUND', ['order_id' => $request->order_id]);
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // 5️⃣ HANDLE STATUS PEMBAYARAN
        if (in_array($request->transaction_status, ['capture', 'settlement'])) {

            // ✅ UPDATE TRANSACTION
            $transaction->status = 1; // PAID
            $transaction->pay_at = now();
            $transaction->save();

            // ✅ ENROLL USER KE KURSUS (INI YANG SEBELUMNYA HILANG)
            UserCourse::firstOrCreate(
                [
                    'user_id'   => $transaction->user_id,
                    'course_id' => $transaction->course_id,
                ],
                [
                    'progress' => 0,
                    'status'   => 1,
                ]
            );

            Log::info('USER ENROLLED TO COURSE', [
                'user_id' => $transaction->user_id,
                'course_id' => $transaction->course_id,
            ]);

        } elseif ($request->transaction_status === 'pending') {

            $transaction->status = 0; // PENDING
            $transaction->save();

        } else {

            $transaction->status = 2; // FAILED / EXPIRED
            $transaction->save();
        }

        return response()->json(['message' => 'OK']);
    }
}
