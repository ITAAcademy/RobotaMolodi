
@extends('newDesign.layouts.admin')

@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
    <h1 class="contentAndmin">Створити індустрію</h1>

    {!! Form::open(array('url' => '/admin/industry', 'method' => 'POST')) !!}
        @include('newDesign.admin.industries._form')
    {!! Form::close() !!}
    </div>
@endsection