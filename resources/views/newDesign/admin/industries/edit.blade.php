@extends('newDesign.layouts.admin')

@section('content')
    <h1>Редагувати індустрію</h1>

    {!! Form::open(array('method'=> 'PUT','route' => ['admin.industry.update', $industry->id,])) !!}
        @include('newDesign.admin.industries._form')
    {!! Form::close() !!}
@endsection