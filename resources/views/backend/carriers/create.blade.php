@extends('backend.layouts.app')

@section('title', __('labels.backend.access.carriers.management') . ' | ' . __('labels.backend.access.carriers.create'))

@section('breadcrumb-links')
    @include('backend.carriers.includes.breadcrumb-links')
@endsection

@section('content')
{{ Form::open(['route' => 'admin.carriers.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-carrier', 'files' => false]) }}

    <div class="card">
        @include('backend.carriers.form')
        @include('backend.components.footer-buttons', [ 'cancelRoute' => 'admin.carriers.index' ])
    </div><!--card-->
    {{ Form::close() }}
@endsection