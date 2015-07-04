<div class="form-group">
    {!! Form::label("Прізвище та ім'я") !!}
    {!! Form::text('name_u', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Телефон') !!}
    {!! Form::text('telephone', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Електронна пошта') !!}
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('position', 'Позиція') !!}
    {!! Form::text('position', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Місто') !!}
    {!! Form::macro('myField', function()
    {
        return '<select name="city" class="form-control" id="selectGaluz">
            <option>Вінниця</option>
            <option>Київ</option>
            <option>Одеса</option>
            <option>Харків</option>
            <option>Львів</option>
        </select>';
    }) !!}
      {!! Form::myField('city', ['class'=>'form-control']) !!}
    <!-- {!! Form::text('industry',null, ['class'=>'form-control']) !!} -->
</div>
<div class="form-group">
    {!! Form::label('Галузь') !!}
    {!! Form::macro('myField', function()
    {
    return '<select name="industry" class="form-control" id="selectGaluz">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>';
    }) !!}
    {!! Form::myField('industry', ['class'=>'form-control']) !!}
    <!-- {!! Form::text('industry',null, ['class'=>'form-control']) !!} -->
</div>
<div class="form-group">
    {!! Form::label('Зарплата(грн*)') !!}
    {!! Form::macro('myField', function()
    {
        return '<select  name="salary" class="form-control" id="selectGaluz">
            <option>1000-1500</option>
            <option>1500-2000</option>
            <option>2000-2500</option>
            <option>2500-3000</option>
            <option>3000-4000</option>
            <option>4000-5000</option>
            <option>5000-6000</option>
            <option>6000-8000</option>
            <option>8000-10000</option>
            <option>10000-20000</option>
            <option>20000 і більше</option>
        </select>';
    }) !!}
    {!! Form::myField('salary', ['class'=>'form-control']) !!}
    <!-- {!! Form::text('industry',null, ['class'=>'form-control']) !!} -->
</div>
<div class="form-group">
    {!! Form::label('Опис') !!}
    {!! Form::textarea('description',null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Зберегти', ['class'=>'btn btn-primary']) !!}
</div>