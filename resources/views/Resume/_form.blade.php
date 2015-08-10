<div class="form-group {{$errors-> has('name_u') ? 'has-error' : ''}}">
    {!! Form::label("Прізвище та ім'я") !!} <span class="required_field">*</span>
    {!! Form::text('name_u', Input::old('name_u'), ['class'=>'form-control']) !!}
    {!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors-> has('telephone') ? 'has-error' : ''}}">
    {!! Form::label('Телефон') !!}
    {!! Form::text('telephone', Input::old('telephone'), ['class'=>'form-control']) !!}
    {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}">
    {!! Form::label('Електронна пошта') !!} <span class="required_field">*</span>
    {!! Form::text('email', Input::old('email'), ['class'=>'form-control']) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
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
        <select name="industry" class="form-control" id="selectIndustry">
            @foreach($industries as $industry)
                <option> {{$industry->name}} </option>
            @endforeach
            @if(Input::old('industry')!= '')
            <option selected>{{Input::old('industry')}}
            @endif
            </option>
        </select>
</div>
<div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}">
    {!! Form::label('position', 'Позиція') !!} <span class="required_field">*</span>
    {!! Form::text('position', Input::old('position'), ['class'=>'form-control']) !!}
    {!! $errors->first('position', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
    {!! Form::label("Зарплата") !!} <span class="required_field">*</span>
    {!! Form::text('salary', Input::old('salary'), ['class'=>'form-control']) !!}
    {!! $errors->first('salary', '<span class="help-block">:message</span>') !!}
</div>
<div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}">
    {!! Form::label('Опис') !!} <span class="required_field">*</span>
    {!! Form::textarea('description',Input::old('description'), ['class'=>'form-control']) !!}
    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
 </div>
<div class="form-group">
    {!! Form::file('loadResume', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    <span class="required_field">*</span> – Обов'язкові для заповнення.
</div>
<div class="form-group">
    {!! Form::submit('Зберегти', ['class'=>'btn btn-primary']) !!}
</div>