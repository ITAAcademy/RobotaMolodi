@extends('app')

@section('content')
    <h1>Редагувати Компанію</h1>
    {!! Form::open(array('method'=> 'PUT','route' => ['company.update',$company->id])) !!}
    @include('company.regCompany')
    {!! Form::close() !!}
@endsection