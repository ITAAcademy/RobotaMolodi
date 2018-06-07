@extends('newDesign.layouts.admin')

@section('content')
    <h4>{{ trans('main.edit') }} індустрію</h4>

    {!! Form::open(array('method'=> 'PUT','route' => ['admin.industry.update', $industry->id,])) !!}
        @include('newDesign.admin.industries._form')
    {!! Form::close() !!}
@endsection