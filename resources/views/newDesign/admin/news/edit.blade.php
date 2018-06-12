@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contentAndmin">
        <h4>Редагувати новину</h4>

        {!! Form::model($newsOne, array(
            'method' => 'PUT',
            'route' => ['admin.news.update', $newsOne->id],
            'files'=>true))
        !!}
        @include('newDesign.admin.news._form')
        <div class="form-group">
            @if($newsOne->img!='Not picture')
                <img class="picture col-xs-6" src="{{ asset($newsOne->getPath().$newsOne->img) }}" >
            @else
                Not picture
            @endif
            {!! Form::label('image', 'Add another image:') !!}
            {!! Form::file('image', ['class' => 'btn btnFile'])!!}
        </div>
        {!! Form::submit('Зберегти зміни', [' class' => 'btn btn-primary crtNews']) !!}
        {!! Form::close() !!}
    </div>
@stop
