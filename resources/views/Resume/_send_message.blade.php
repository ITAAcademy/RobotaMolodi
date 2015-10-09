<div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
    {!! Form::label("Тема") !!}<span class="required_field">*</span>
    {!! Form::text('salary', Input::old('salary'), ['class'=>'form-control']) !!}
    {!! $errors->first('salary', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}">
    {!! Form::label('Ваш запит') !!}<span class="required_field">*</span>
    {!! Form::textarea('description',Input::old('description'), ['class'=>'form-control']) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    <span class="required_field">*</span> – Обов'язкові для заповнення.
</div>
<div class="form-group">
    {!! Form::submit('Відправити', ['class'=>'btn btn-primary']) !!}
</div>