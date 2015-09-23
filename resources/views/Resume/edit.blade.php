@extends('app') <!-- Куди вставляється весь цей код Штмл -->

@section('title')
    <h2>Написати резюме</h2>
    <div>
        {!! link_to_route('resumes', 'Мої резюме') !!} <!-- Створення силки -->
    </div>
@stop

@section('content')
    {!!Form::model($resume,array('route' =>array('resume.update',$resume->id),'method' => 'put','enctype' => 'multipart/form-data'))!!}
    <div class="form-group {{$errors-> has('name_u') ? 'has-error' : ''}}">
        {!! Form::label("Прізвище та ім'я") !!} <span class="required_field">*</span>
        {!! Form::text('name_u', $resume->name_u, ['class'=>'form-control']) !!}
        {!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{$errors-> has('telephone') ? 'has-error' : ''}}">
        {!! Form::label('Телефон') !!}
        {!! Form::text('telephone', $resume->telephone, ['class'=>'form-control']) !!}
        {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}">
        {!! Form::label('Електронна пошта') !!} <span class="required_field">*</span>
        {!! Form::text('email', $resume->email, ['class'=>'form-control']) !!}
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group">
        {!! Form::label('Місто') !!}
        <select name="city" class="form-control" id="selectCity">
            @foreach($cities as $city)
                <option value="{{$city->id}}"> {{$city->name}} </option>
            @endforeach
            @if(Input::old('city')!= '')
                <option selected>{{Input::old('city')}}
                    @endif
                </option>
        </select>
    </div>
    <div class="form-group">
        {!! Form::label('Галузь') !!}
        <select name="industry" class="form-control" id="selectIndustry">
            @foreach($industries as $industry)
                <option value="{{$industry->id}}"> {{$industry->name}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}">
        {!! Form::label('position', 'Позиція') !!} <span class="required_field">*</span>
        {!! Form::text('position', $resume->position, ['class'=>'form-control']) !!}
        {!! $errors->first('position', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
        {!! Form::label("Зарплата") !!} <span class="required_field">*</span>
        {!! Form::text('salary', $resume->salary, ['class'=>'form-control']) !!}
        {!! $errors->first('salary', '<span class="help-block">:message</span>') !!}
    </div>
    <div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}">
        {!! Form::label('Опис') !!} <span class="required_field">*</span>
        {!! Form::textarea('description',$resume->description, ['class'=>'form-control']) !!}
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
    {!!Form::close()!!}
@stop