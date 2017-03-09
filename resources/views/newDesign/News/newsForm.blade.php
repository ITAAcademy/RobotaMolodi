    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            {!!Form::file('image',['class' => 'btn'])!!}
        </div>
        {!! Form::submit('Create news', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>