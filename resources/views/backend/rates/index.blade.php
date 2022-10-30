@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.rates.management'))

@section('breadcrumb-links')
@include('backend.rates.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.rates.management') }} <small class="text-muted">{{ __('labels.backend.access.rates.active') }}</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row m-t-2" style="margin-top:30px;">
            <div class="col-sm-12">
            <form method="post" action="{{ route('admin.rates.upload') }}" enctype="multipart/form-data">@csrf
            <div class="form-group row">
                {{ Form::label('status', 'Select File', ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    <input id="import_csv" name="import_csv" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />  
                </div>
                <!--col-->
            </div>
            <div class="form-group row">
                <div class="col-md-2">
                </div>
                <div class="col-md-10">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
                <!--col-->
            </div>
            </form>

            </div>
            <!--col-->
        </div>

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="rates-table" class="table" data-ajax_url="{{ route("admin.rates.get") }}">
                        <thead>
                            <tr>
                                <th>{{ trans('labels.backend.access.rates.table.option_name') }}</th>
                                <th>{{ trans('labels.backend.access.rates.table.upper_weight') }}</th>
                                <th>{{ trans('labels.backend.access.rates.table.lower_weight') }}</th>
                                <th>{{ trans('labels.backend.access.rates.table.upper_height') }}</th>
                                <th>{{ trans('labels.backend.access.rates.table.lower_height') }}</th>
                                <th>{{ trans('labels.backend.access.rates.table.upper_width') }}</th>
                                <th>{{ trans('labels.backend.access.rates.table.lower_width') }}</th>
                                <th>{{ trans('labels.backend.access.rates.table.price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--col-->
        </div>
        <!--row-->

    </div>
    <!--card-body-->
</div>
<!--card-->
@endsection

@section('pagescript')
<script>
    FTX.Utils.documentReady(function() {
        FTX.Rates.list.init();
    });
</script>

@stop