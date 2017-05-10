@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {!! Form::label('image', 'Add image:') !!}
    {!! Form::file('image',['class' => 'btn'])!!}
</div>
<div class="form-group">
    {!! Form::label('url', 'Url:', ['class' => 'control-label']) !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category', 'Category:', ['class' => 'control-label']) !!}
    {!! Form::text('category', null, ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Create slider', ['class' => 'btn btn-primary']) !!}