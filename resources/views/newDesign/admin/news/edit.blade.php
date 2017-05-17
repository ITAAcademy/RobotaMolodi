@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')

    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr>
    {!! Form::model($newsOne, array(
    'method' => 'PUT',
    'route' => ['admin.news.update', $newsOne->id,
     ],
     'files'=>true))!!}

    <div class="form-group">
        {!! Form::label('name', 'Title:', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'editor1']) !!}
        <br>
        {!! Form::label('image', 'Add image:') !!}
        {!!Form::file('image',['class' => 'btn'])!!}
    </div>
    <div>
        {!! Form::label('published', 'Опублікувати:') !!}
        {!! Form::checkbox('published') !!}
        <br>
    </div>
    {!! Form::submit('Update news', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

    <script type="text/javascript">
    CKEDITOR.replace('editor1');
    </script>

@stop