@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')
    <div class="col-md-10 col-sm-10 col-xs-10 contentAndmin">
    <h1 >Редагувати новину</h1>

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
        {!! Form::submit('Edit news', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

    <script type="text/javascript">
        CKEDITOR.replace('editor1');
    </script>
@stop
