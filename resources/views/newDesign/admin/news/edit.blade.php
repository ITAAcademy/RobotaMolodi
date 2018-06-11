@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')
    <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 contentAndmin">
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
            {!! Form::file('image', ['class' => 'btn'])!!}
        </div>
        {!! Form::submit('Edit', [' class' => 'btn']) !!}
        {!! Form::close() !!}
    </div>
    {{--<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">{!! Form::submit('&#xf044;', [' class' => 'fa', 'style' => 'color:darkorange; border: none; background:none; font-size:20px']) !!}--}}
        {{--{!! Form::close() !!}--}}
    {{--</div>--}}
@stop
