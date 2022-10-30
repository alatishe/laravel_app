@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))


@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
Csv Imports                </h4>
            </div>
            <!--col-->
        </div>
        <!--row--->

        <div class="row m-t-2" style="margin-top:30px;">
            <div class="col-sm-12">
            <form method="post" action="" enctype="multipart/form-data">@csrf
            <div class="form-group row">
                {{ Form::label('status', 'Select File', ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    <input id="fileSelect" name="import_csv" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />  
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
                <div class="table-responsive" style="overflow-y:visible;overflow-x:visible;">
                    <table class="table" id="rates-table" data-ajax_url="{{ route("admin.carrier.list") }}">
                        <thead>
                            <tr>
                                <th>Option Name</th>
                                <th>Upper limit Weight</th>
                                <th>Lower limit Weight</th>
                                <th>Upper limit Height</th>
                                <th>Lower limit Height</th>
                                <th>Upper limit Width</th>
                                <th>Lower limit Width</th>
                                <th>Price</th>
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
    <script src="https://40.121.65.234:8085/public/js/backend/rates.js"></script>
<script>
    FTX.Utils.documentReady(function() {
        FTX.Rates.list.init('active');
    });
</script>
@endsection