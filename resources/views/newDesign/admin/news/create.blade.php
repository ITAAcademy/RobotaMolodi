@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12 contentAndmin">
        <h4>Створити новину</h4>

        {!! Form::open(array('url' => '/admin/news','files'=>true)) !!}
        @include('newDesign.admin.news._form')
        <div class="form-group">
            {!! Form::label('image', 'Add image:') !!}
            {!! Form::file('image',['class' => 'btn btnFile'])!!}
        </div>

        {!! Form::submit('Створити новину', ['class' => 'btn btn-primary crtNews']) !!}

        {!! Form::close() !!}
    </div>
@endsection
