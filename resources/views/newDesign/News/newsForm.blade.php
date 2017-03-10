<html>
<head>
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"
            type="text/javascript" charset="utf-8" ></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type ="text/javascript" src="{{asset('assets/js/ckeditor.js')}}"></script>

</head>
<body>

<div class="col-md-8">


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

    {!! Form::open(array('url' => '/news','files'=>true)) !!}


    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label','placeholder' => 'Paswoord']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'editor1']) !!}
        {!! Form::label('published', 'Published:', ['class' => 'chekbox-label']) !!}
        {!! Form::checkbox('checkbox', 'value') !!}
        {!! Form::text('publich_data', null, ['class' => 'form-control', 'placeholder' => '01/01/2017', 'autofocus' => 'true']) !!}



        <script type="text/javascript">
            CKEDITOR.replace( 'editor1' );
        </script>

        {!!Form::file('image',['class' => 'btn'])!!}
    </div>

    {!! Form::submit('Create news', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
</body>
</html>

