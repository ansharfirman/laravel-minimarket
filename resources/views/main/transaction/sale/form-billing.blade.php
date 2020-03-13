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
                    <label for="">Customer</label>
                    {!! Form::select('customer_id', $customers->pluck('name','id'), null, ['id'=>'customer_id','class'=>'select2 form-control', 'placeholder'=> '--- Select Customer ---']) !!}
                </div>
            </div>
        </form>
    </div>
    <div class="box-footer">
        <i class="fa fa-user-plus"></i>&nbsp; Casheir : {{ \Auth::User()->getFullname() }}
    </div>
</div><!-- /.box -->