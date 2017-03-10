@extends('newDesign.layouts.admin')

@section('content')

    <h1>{{ $newsOne->title }}</h1>
    <p class="lead">{{ $newsOne->description }}</p>
    <hr>
    {!! Form::model($newsOne, array(
    'method' => 'PATCH',
    'route' => ['news.update', $newsOne->id]))!!}

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'focus']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'editor1']) !!}
        {!! Form::label('checkbox', 'Published:') !!}
        {!! Form::checkbox('checkbox', '1',true) !!}
        <br>
        {!! Form::label('publich_date', 'Publish date:', ['class' => 'control-label']) !!}
        {!! Form::text('publich_date', null, ['class' => 'form-control', 'placeholder' => '01/01/2017', 'autofocus' => 'true']) !!}


        <script type="text/javascript">
            CKEDITOR.replace('editor1');
        </script>
        {!! Form::label('image', 'Add image:') !!}
        {!!Form::file('image',['class' => 'btn'])!!}
    </div>
    {!! Form::submit('Create news', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@stop