@extends('backend.layouts.app')

@section('title', __('labels.backend.access.rates.management') . ' | ' . __('labels.backend.access.rates.create'))

@section('breadcrumb-links')
    @include('backend.rates.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.rates.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.rates.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.rates.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection