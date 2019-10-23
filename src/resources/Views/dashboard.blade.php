@extends('admin::layouts.admin-layout-default')

@section('title')
    <title>Dashboard | VOF Admin</title>
@endsection()

@section('sidebar')
    @include('admin::partials.sidebar')
@endsection()

@section('content')
    <h2>
        @lang('admin::admin.dashboard.welcome-user', ['user' => Auth::guard('admin')->user()->name])
    </h2>
    <hr>
    <span>Under Construction</span>
@endsection()
