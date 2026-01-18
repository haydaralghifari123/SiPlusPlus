<?php

namespace App\Http\Controllers\Mitra;

use App\DataTables\Mitra\TransactionmitraDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Transaction;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use PDF;

class TransactionmitraController extends Controller
{
    protected $transaction;
    
    public function __construct(Transaction $transaction)
    {
        $this->transaction = new BaseRepository($transaction);
    }

    public function index(TransactionmitraDatatable $datatable)
    {
        try {
            return $datatable->render('mitra.transaction.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function exportPdf()
    {
        try {
            $transactions = $this->transaction->Query()
                ->with(['course', 'user'])
                ->whereHas('course', function ($q) {
                    $q->where('mitra_id', auth()->user()->mitra->id);
                })
                ->where('status', '1')
                ->orderByDesc('id')
                ->get();
            
            $totalTransactions = $transactions->count();
            $pdf = PDF::loadView('mitra.transaction.export-pdf', compact('transactions', 'totalTransactions'));
            return $pdf->download('mitra_transactions_' . auth()->user()->name . '_' . now()->format('Y-m-d') . '.pdf');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
