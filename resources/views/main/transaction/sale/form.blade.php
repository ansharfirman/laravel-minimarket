@extends('layouts.app')
@section('title') {{ $title }} @endsection



@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $title }}
        <small>{{ $subtitle }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('') }}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="javascript:void(0);">Transaction</a></li>
        <li><a href="{{ route($route.'.index') }}">{{ $title }}</a></li>
        <li class="active">Create Invoice</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    @include('layouts.alert')
    <div class="row" id="invoice-content">
        <div class="col-md-6">
            @include('main.transaction.sale.form-product')
        </div>
        <div class="col-md-6">
            @include('main.transaction.sale.form-billing')
        </div>
    </div>
</section><!-- /.content -->

@endsection

@section('scripts')
<script src="{{ asset('assets/scripts/transaction.sale.form.js') }}?{{ time() }}"></script>
@endsection