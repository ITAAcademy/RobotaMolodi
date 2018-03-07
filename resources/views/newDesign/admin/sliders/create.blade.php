@extends('newDesign.layouts.admin')

@section('content')
    {!! Form::open(array('url' => '/admin/slider', 'enctype' => 'multipart/form-data')) !!}
        @include('newDesign.admin.sliders._form')
    {!! Form::close() !!}
@endsection


<!-- <div class=" col-md-10 col-sm-10 col-xs-10 contentAndmin"> -->
