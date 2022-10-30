@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Carrier Management'))

@section('breadcrumb-links')
@include('backend.carriers.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Carrier Management <small class="text-muted">Carrier List</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="carriers-table" class="table" data-ajax_url="{{ route("admin.carriers.get") }}">
                        <thead>
                            <tr>
                                <th>Shipping Partner Name</th>
                                <th>Shipping Partner Email</th>
                                <th>Shipping Carrier Name</th>     
                                <th>{{ trans('labels.general.actions') }}</th>
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
        FTX.Carriers.list.init();
    });
</script>

@stop