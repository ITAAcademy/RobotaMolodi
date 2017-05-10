@extends('newDesign.layouts.admin')

@section('content')
    {!! Form::open(array('url' => '/admin/slider', 'enctype' => 'multipart/form-data')) !!}
        @include('newDesign.admin.sliders._form')
    {!! Form::close() !!}
@endsection
