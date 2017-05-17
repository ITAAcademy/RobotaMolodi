@extends('newDesign.layouts.admin')

@section('content')
    <h1>Створити індустрію</h1>

    {!! Form::open(array('url' => '/admin/industry', 'method' => 'POST')) !!}
        @include('newDesign.admin.industries._form')
    {!! Form::close() !!}
@endsection