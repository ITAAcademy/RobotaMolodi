<div class="form-group {{$errors-> has('name_u') ? 'has-error' : ''}}">
    {!! Form::label("Прізвище та ім'я") !!} <span class="required_field">*</span>
    {!! Form::text('name_u', null, ['class'=>'form-control']) !!}
    {!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    {!! Form::label('Телефон') !!}
    {!! Form::text('telephone', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}">
    {!! Form::label('Електронна пошта') !!} <span class="required_field">*</span>
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}">
    {!! Form::label('position', 'Позиція') !!} <span class="required_field">*</span>
    {!! Form::text('position', null, ['class'=>'form-control']) !!}
    {!! $errors->first('position', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">

    {!! Form::label('Місто') !!}
    {!! Form::macro('myField', function($cities)
    {
        $resultString = "<select name='city' class='form-control' id='selectCity'>";
        $optionsArray = array();

        foreach($cities as $city)
        {
            $optionArray[] = "<option>".$city->name."</option>";
        }
        $resultString = $resultString.join("\n",$optionArray). "</select>";
        return $resultString;
    }) !!}
      {!! Form::myField($cities, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Галузь') !!}
    {!! Form::macro('myField', function()
    {
    return '<select name="industry" class="form-control" id="selectIndustry">
            <option>Інформаційні технології</option>
            <option>Керівництво/топ-менеджмент</option>
            <option>Менеджери/керівники середньої ланки</option>
            <option>Освіта/наука/виховання</option>
            <option>Екологія/охорона навколишнього середовища</option>
        </select>';
    }) !!}
    {!! Form::myField('industry', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Зарплата(грн*)') !!}
    {!! Form::macro('myField', function()
    {
        return '<select  name="salary" class="form-control" id="selectSalary">
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
</div>
<div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}">
    {!! Form::label('Опис') !!} <span class="required_field">*</span>
    {!! Form::textarea('description',null, ['class'=>'form-control']) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    <span class="required_field">*</span> – Обов'язкові для заповнення.
</div>
<div class="form-group">
    {!! Form::submit('Зберегти', ['class'=>'btn btn-primary']) !!}
</div>