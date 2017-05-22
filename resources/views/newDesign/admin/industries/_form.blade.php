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
    {!! Form::label('name', 'Назва:', ['class' => 'focus']) !!}
    {!! Form::text('name', $industry->name, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Зберегти', ['class' => 'btn btn-primary']) !!}
