@extends('app')

@section('content')
    <h1>Створити Компанію</h1>
    {!! Form::open(array('url' => 'company/edit', 'method' => 'POST')) !!}
    @include('company.regCompany')
    {!! Form::close() !!}
@endsection