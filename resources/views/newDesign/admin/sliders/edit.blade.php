@extends('newDesign.layouts.admin')

@section('content')
    {!! Form::model($slider, array('method' => 'PUT','route' => ['admin.slider.update', $slider->id,],'enctype' => 'multipart/form-data'))!!}
        @include('newDesign.admin.sliders._form')
    {!! Form::close() !!}
@stop
