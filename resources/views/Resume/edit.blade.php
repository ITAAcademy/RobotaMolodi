@extends('app') <!-- Куди вставляється весь цей код Штмл -->

@section('title')
    <h2>Редагування резюме</h2>
    <div>
        {!! link_to_route('resumes', 'Мої резюме') !!} <!-- Створення силки -->
    </div>
@stop

@section('content')
    <div class="row">
    {!!Form::model($resume,array('route' =>array('resume.update',$resume->id),'method' => 'put','enctype' => 'multipart/form-data'))!!}
    <div class="form-group {{$errors-> has('name_u') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label("Прізвище та ім'я") !!} <span class="required_field">*</span></div>
        <div class="col-md-6 col-sm-6"> {!! Form::text('name_u', $resume->name_u, ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4"> {!! $errors->first('name_u', '<span class="help-block">:message</span>') !!}</div>
    </div>
    </div><br>

   <div class="row">
    <div class="form-group {{$errors-> has('telephone') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Телефон') !!}</div>
        <div class="col-md-6 col-sm-6">{!! Form::text('telephone', $resume->telephone, ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}</div>
    </div>
   </div><br>

            <div class="row">
    <div class="form-group {{$errors-> has('email') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Електронна пошта') !!} <span class="required_field">*</span></div>
        <div class="col-md-6 col-sm-6">{!! Form::text('email', $resume->email, ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4"> {!! $errors->first('email', '<span class="help-block">:message</span>') !!}</div>
    </div>
    </div><br>

   <div class="row">
    <div class="form-group">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Місто') !!}</div>
        <div class=" col-md-6 col-sm-6"> <select name="city" class="form-control" id="selectCity">
            @foreach($cities as $city)
                <option value="{{$city->id}}"> {{$city->name}} </option>
            @endforeach
            @if(Input::old('city')!= '')
                @foreach($cities as $city)
                    @if($city->id == Input::old('city'))
                        <option value="{{$city->id}}" selected>{{$city->name}}</option>
                    @endif
                @endforeach
            @else
                <option value="{{$resume->city}}" selected>{{$resume->City()->name}}</option>
            @endif
        </select></div>
    </div>
   </div><br>

   <div class="row">
    <div class="form-group">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Галузь') !!}</div>
        <div class=" col-md-6 col-sm-6"> <select name="industry" class="form-control" id="selectIndustry">
            @foreach($industries as $industry)
                <option value="{{$industry->id}}"> {{$industry->name}} </option>
            @endforeach
            <option value="{{$resume->industry}}" selected>{{$resume->Industry()->name}}</option>
        </select></div>
    </div>
   </div><br>

   <div class="row">
    <div class="form-group {{$errors-> has('position') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('position', 'Позиція') !!} <span class="required_field">*</span></div>
        <div class=" col-md-6 col-sm-6"> {!! Form::text('position', $resume->position, ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('position', '<span class="help-block">:message</span>') !!}</div>
    </div>
   </div><br>

   <div class="row">
    <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label("Зарплата (мiнiмальна)") !!} <span class="required_field">*</span></div>
        <div class=" col-md-6 col-sm-6"> {!! Form::text('salary', $resume->salary, ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('salary', '<span class="help-block">:message</span>') !!}</div>
    </div>
   </div><br>

    <div class="row">
        <div class="form-group {{$errors-> has('salary') ? 'has-error' : ''}}">
            <div class="col-md-2 col-sm-2 control-label">  {!! Form::label("Зарплата (максимальна)") !!} <span class="required_field">*</span></div>
            <div class=" col-md-6 col-sm-6"> {!! Form::text('salary_max', $resume->salary_max, ['class'=>'form-control']) !!}</div>
            <div class=" col-md-4 col-sm-4">{!! $errors->first('salary', '<span class="help-block">:message</span>') !!}</div>
        </div>
    </div><br>

    <div class="row">
        <div class="form-group">
            <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Валюта') !!}</div>
            <div class=" col-md-6 col-sm-6">
                <select class="form-control" id="selectCurrency" name="currency_id">
                    @foreach($currencies as $currency)
                        {
                        <option value="{{$currency->id}}">{{$currency->currency}}</option>
                        }
                    @endforeach
                </select>
            </div>
        </div>
    </div><br>

    <div class="row">
    <div class="form-group {{$errors-> has('description') ? 'has-error' : ''}}">
        <div class="col-md-2 col-sm-2 control-label">  {!! Form::label('Опис') !!} <span class="required_field">*</span></div>
        <div class=" col-md-6 col-sm-6"> {!! Form::textarea('description',$resume->description, ['class'=>'form-control']) !!}</div>
        <div class=" col-md-4 col-sm-4">{!! $errors->first('description', '<span class="help-block">:message</span>') !!}</div>
    </div>
    </div><br>

   <div class="row">
    <div class="form-group">
        <div class="col-sm-offset-2 col-md-2  col-sm-2"> {!! Form::file('loadResume', null, array('class' => 'form-control')) !!}</div>
    </div>
   </div><br>

     <div class="row">
    <div class="form-group">
        <div class=" col-sm-offset-2 col-md-6 col-sm-6">  <span class="required_field">*</span> – Обов'язкові для заповнення.</div>
    </div>
     </div><br>

    <div class="row">
    <div class="form-group">
        <div class="col-sm-offset-2 col-md-2  col-sm-2">{!! Form::submit('Зберегти', ['class'=>'btn btn-primary']) !!}</div>
    </div>
    {!!Form::close()!!}
    </div><br>
@stop