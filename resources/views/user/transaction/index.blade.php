@extends('layouts.user.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data {{ __('sidebar.transaction') }}</h4>
        <a href="{{ route('user.transaction.export-pdf') }}" class="btn btn-primary">Export PDF</a>
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
