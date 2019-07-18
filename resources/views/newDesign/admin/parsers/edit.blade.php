@extends('newDesign.layouts.admin')

@section('content')
    <h4>{{ trans('main.edit') }} ClientId</h4>

    {!! Form::open(array('method'=> 'PUT','route' => ['admin.client-id.update', $client_id->id,])) !!}
    @include('newDesign.admin.parsers._form')
    {!! Form::close() !!}
@endsection