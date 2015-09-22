@extends('app')

@section('content')

    <link href="{{ asset('/css/po_test/css') }}" rel="stylesheet">
    <link href="{{ asset('/css/po_test/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/po_test/style.css') }}" rel="stylesheet">

    @yield('test_start')
    @yield('test_1')

@stop
