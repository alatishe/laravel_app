@extends('backend.layouts.app')

@section('title', __('labels.backend.access.rates.management') . ' | ' . __('labels.backend.access.rates.edit'))

@section('breadcrumb-links')
    @include('backend.rates.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($rate, ['route' => ['admin.rates.update', $rate], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.rates.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.rates.index', 'id' => $rate->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection