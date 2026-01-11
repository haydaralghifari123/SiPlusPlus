<?php

namespace App\DataTables\Mitra;

use App\Models\Feature\Transaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TransactionmitraDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()

            ->addColumn('buyer_name', function ($row) {
                return $row->user->name ?? '-';
            })

            ->addColumn('course_name', function ($row) {
                return $row->course->name ?? '-';
            })

            ->addColumn('html_status', function ($row) {
                if ($row->status == 1) {
                    return '<span class="badge bg-success">Paid</span>';
                }
                return '<span class="badge bg-secondary">Unpaid</span>';
            })

            ->addColumn('action', function ($row) {
                return '<a href="' .
                    route('frontend.user.transaction.invoice', $row->invoice_number) .
                    '" class="btn btn-sm btn-primary">
                        <i class="bi bi-eye"></i>
                    </a>';
            })

            ->rawColumns(['action', 'html_status'])
            ->setRowId('id');
    }

    public function query(Transaction $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['course', 'user'])
            ->whereHas('course', function ($q) {
                $q->where('mitra_id', auth()->user()->mitra->id);
            })
            ->orderByDesc('id');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('transaction-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }

    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                ->title('#')
                ->orderable(false)
                ->searchable(false),

            Column::make('invoice_number')
                ->title('Invoice'),

            Column::make('buyer_name')
                ->title('Pembeli')
                ->orderable(false)
                ->searchable(false),

            Column::make('course_name')
                ->title('Judul Kursus')
                ->orderable(false)
                ->searchable(false),

            Column::make('total_pay')
                ->title('Total Pembayaran'),

            Column::make('html_status')
                ->title('Status')
                ->orderable(false)
                ->searchable(false),

            Column::make('action')
                ->title('Aksi')
                ->orderable(false)
                ->searchable(false),
        ];
    }

    protected function filename(): string
    {
        return 'Transaction_Mitra_' . date('YmdHis');
    }
}
