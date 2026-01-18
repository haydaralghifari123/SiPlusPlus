<?php

namespace App\Http\Controllers\Backend\Feature;

use App\DataTables\Feature\TransactionDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Transaction;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use PDF;

class TransactionController extends Controller
{
    protected $transaction;
    public function __construct(Transaction $transaction)
    {
        $this->transaction = new BaseRepository($transaction);
    }

    public function index(TransactionDatatable $datatable)
    {
        try {
            return $datatable->render('backend.feature.transaction.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $data['transaction'] = $this->transaction->find($id);
            return view('backend.feature.transaction.show',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function exportPdf()
    {
        try {
            $transactions = $this->transaction->Query()
                ->with(['course', 'user'])
                ->where('status', '1')
                ->orderByDesc('id')
                ->get();

            $totalTransactions = $transactions->count();
            $pdf = PDF::loadView('backend.feature.transaction.export-pdf', compact('transactions', 'totalTransactions'));
            return $pdf->download('admin_successful_transactions_' . now()->format('Y-m-d') . '.pdf');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function exportPdfAll()
    {
        try {
            $transactions = $this->transaction->Query()
                ->with(['course', 'user'])
                ->orderByDesc('id')
                ->get();

            $totalTransactions = $transactions->count();
            $pdf = PDF::loadView('backend.feature.transaction.export-pdf-all', compact('transactions', 'totalTransactions'));
            return $pdf->download('admin_all_transactions_' . now()->format('Y-m-d') . '.pdf');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
