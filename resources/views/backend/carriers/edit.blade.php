@extends('backend.layouts.app')

@section('title', __('labels.backend.access.carriers.management') . ' | ' . __('labels.backend.access.carriers.edit'))

@section('breadcrumb-links')
    @include('backend.carriers.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::model($carriers, ['route' => ['admin.carriers.update', $carriers], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'id' => 'create-permission', 'files' => true]) }}

    <div class="card">
        @include('backend.carriers.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.carriers.index', 'id' => $carriers->id ])
    </div><!--card-->
    {{ Form::close() }}
@endsection