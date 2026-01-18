@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data {{ __('sidebar.transaction') }}</h4>
        <div>
            <a href="{{ route('backend.feature.transaction.export-pdf') }}" class="btn btn-success btn-sm">Export PDF (Paid)</a>
            <a href="{{ route('backend.feature.transaction.export-pdf-all') }}" class="btn btn-primary btn-sm">Export PDF (All)</a>
        </div>
    </div>
    <div class="card-body">
       <div class="table-responsive">
            <div class="table-responsive">
                {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
            </div>
       </div>
    </div>
</div>
@endsection
@push('js')
{!! $dataTable->scripts() !!}
@endpush