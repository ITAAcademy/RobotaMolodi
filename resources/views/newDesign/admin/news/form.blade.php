@extends('newDesign.layouts.admin')

@section('ckeditor')
    @include('newDesign.layouts.includes.ckeditor')
@stop
@section('content')
    <h1>Create news</h1>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open(array('url' => '/admin/news','files'=>true)) !!}
    <div class="form-group">
        {!! Form::label('name', 'Title:', ['class' => 'focus']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'editor2']) !!}

           <br>

        {!! Form::label('image', 'Add image:') !!}
        {!!Form::file('image',['class' => 'btn'])!!}
    </div>
    {!! Form::submit('Create news', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}


    <script type="text/javascript">
        CKEDITOR.replace('editor2');
    </script>
@endsection
