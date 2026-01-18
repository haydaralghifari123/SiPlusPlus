<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\TransactionUserDatatable;
use App\Http\Controllers\Controller;
use App\Models\Feature\Course;
use App\Models\Feature\Transaction;
use App\Repositories\BaseRepository;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
class TransactionController extends Controller
{
    protected $transaction,$course;
    public function __construct(Transaction $transaction,Course $course)
    {
        $this->transaction = new BaseRepository($transaction);
        $this->course = new BaseRepository($course);
    }

    public function index(TransactionUserDatatable $datatable)
    {
        try {
            return $datatable->render('user.transaction.index');
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function invoice($invoice)
    {
        try {
            $data['transaction'] = $this->transaction->Query()->where('invoice_number',$invoice)->first();
            return view('user.transaction.invoice',compact('data'));
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $invoice_number = 'INV' . strtoupper(Str::random(4)) . date('md') . rand(0,9999);
            $course = $this->course->find($request->course_id);
            $store = [
                'invoice_number' => $invoice_number,
                'course_id' => $course->id,
                'total_pay' => $course->price,
                'user_id'   => auth()->user()->id,
            ];
            $transaction = $this->transaction->store($store);
            $user = [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'phone' => '0812198361287'
            ];
            $midtrans = new CreateSnapTokenService($transaction,$user);
            $snapToken = $midtrans->getSnapToken();
            $transaction->snap_token = $snapToken;
            $transaction->save();
            return redirect()->route('frontend.user.transaction.invoice',$transaction->invoice_number);
        }catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }

    }

    public function exportPdf()
    {
        try {
            $transactions = $this->transaction->Query()->with(['Course'])->where('user_id', auth()->user()->id)->where('status', '1')->get();
            $totalTransactions = $transactions->count();
            $pdf = PDF::loadView('user.transaction.export-pdf', compact('transactions', 'totalTransactions'));
            return $pdf->download('transactions_' . auth()->user()->name . '_' . now()->format('Y-m-d') . '.pdf');
        } catch (\Throwable $th) {
            return view('error.index',['message' => $th->getMessage()]);
        }
    }
}
