@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin container">
        <h1>Створити новину</h1>

        {!! Form::open(array('url' => '/admin/news','files'=>true)) !!}
            @include('newDesign.admin.news._form')
            <div class="form-group">
                {!! Form::label('image', 'Add image:') !!}
                {!! Form::file('image',['class' => 'btn'])!!}
            </div>
            {!! Form::submit('Create news', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
