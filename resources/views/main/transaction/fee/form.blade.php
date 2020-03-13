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
    <!-- Default box -->
    <div class="box {{ CommonHelper::getBoxTheme() }}">
        <div class="box-header with-border">
            <div class="clearfix">
                <div class="pull-left">
                    <h3 class="box-title">
                        <i class="fa fa-edit"></i>&nbsp;Detail Billing
                    </h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-warning btn-sm" href="{{ route($route.'.index') }}" data-toggle='tooltip' data-placement='top'  data-original-title='Cancel'>
                        <i class="fa fa-close"></i>&nbsp;Cancel
                    </a>
                    @can("delete_".$route)
                    <a class="btn btn-danger btn-sm" href="javacsript:void(0);" id="btn-delete" data-toggle='tooltip' data-placement='top'  data-original-title='Delete'>
                        <i class="fa fa-trash"></i>&nbsp;Delete
                    </a>
                    <form id="delete-form" action="{{ route($route.'.destroy', ['id'=> $model->id]) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                    @endcan
                </div>
            </div>
        </div>
        <div class="box-body">
            <form>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Invoice Date</label>
                        <input type="text" class="form-control" disabled="disabled" value="{{ $model->invoice_date }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Invoice Number</label>
                        <input type="text" class="form-control" disabled="disabled" value="{{ $model->invoice_number }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Stakeholder</label>
                        {!! Form::select('stakeholder_id', $stakeholders->pluck('name','id'), null, ['id'=>'stakeholder_id','class'=>'select2 form-control', 'placeholder'=> '--- Select Stakeholder ---']) !!}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Description</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </form>
        </div>
        <div class="box-footer">
            <i class="fa fa-user-plus"></i>&nbsp; Casheir : {{ \Auth::User()->getFullname() }}
        </div>
    </div><!-- /.box -->
</section><!-- /.content -->

@endsection
