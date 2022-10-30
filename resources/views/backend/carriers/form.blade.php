<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                Carrier Management
                <small class="text-muted">Create Carrier</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('partner_name', 'Shipping Partner Name', ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('partner_name', null, ['class' => 'form-control', 'placeholder' => 'Shipping Partner Name', 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('partner_email', 'Shipping Partner Email', ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::email('partner_email', null, ['class' => 'form-control', 'placeholder' => 'Shipping Partner Email']) }}
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
                {{ Form::label('carrier_name', 'Carrier Name', ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('carrier_name', null, ['class' => 'form-control', 'placeholder' => 'Carrier Name']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->


            <!--form-group-->
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--card-body-->

@section('pagescript')
<script type="text/javascript">
    FTX.Utils.documentReady(function() {
        FTX.Carriers.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop