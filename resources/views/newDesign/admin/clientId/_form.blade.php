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
    {!! Form::label('name', 'Назва сайту:', ['class' => 'focus']) !!}
    {!! Form::text('site_name', $client_id->site_name, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('&#xf0c7;', [' class' => 'fa', 'style' => 'color:darkorange; border: none; background:none; font-size:20px']) !!}