@extends('app')
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/consult.css') }}" rel="stylesheet">

{{--@php--}}
        {{--$url = url('quizzes/create');--}}
        {{--$typeDate = "date";--}}
        {{--$nameButton = " Create ";--}}
        {{--$namePage = "Input the data";--}}
        {{--$placeholderName = "Input name of the test.";--}}
        {{--$placeholderDuration = "Input duration of the test.";--}}
        {{--$classButton = "btn btn-outline-primary btn-lg btn-block";--}}
{{--@endphp--}}
{{--@section('script')--}}
    {{--@parent--}}
    {{--@include('layout.scriptsValidate')--}}
{{--@endsection()--}}
{{--@section('style')--}}
    {{--@parent--}}
    {{--@include('layout.styleValidate')--}}
{{--@endsection--}}

@section('content')
    <div class="content">
        <form class="form" role="form" method="POST" action="{{ url('sconsult') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="consult_id" value="{{ auth()->user()->id }}">

            <div class="form-group row">
                <label for="telephone" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.phone') }}
                </label>
                <div class="col-md-5">
                    <input type="text" placeholder="{{ trans('main.phone') }}" class="form-control" name="telephone"
                           value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="city" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.city') }}
                </label>
                <div class="col-md-5 col-sm-5">
                    <select class="inputPlace2" id="city_id" name="city">
                        @foreach($cities as $city)
                            <option value="{{$city->name}}">{{$city->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--<div class="col-md-5">--}}
                {{--<input type="text" placeholder="{{ trans('main.city') }}" class="form-control" name="city"--}}
                {{--value="{{ old('city') }}">--}}
                {{--</div>--}}
            </div>

            <div class="form-group row">
                <label for="area" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.area') }}
                </label>
                <div class="col-md-5 col-sm-5">
                    <select class="inputPlace2" id="industry_id" name="area">
                        @foreach($industries as $industry)
                            <option value="{{$industry->name}}">{{$industry->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--<div class="col-md-5">--}}
                {{--<input type="text" placeholder="{{ trans('main.area') }}" class="form-control" name="area"--}}
                {{--value="{{ old('area') }}">--}}
                {{--</div>--}}
            </div>

            <div class="form-group row">
                <label for="position" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.position') }}
                </label>
                <div class="col-md-5">
                    <input type="text" placeholder=" {{ trans('main.position') }}" class="form-control" name="position"
                           value="{{ old('position') }}">
                </div>
            </div>

            {{--<div class="form-group">--}}
            {{--<div class="col-md-5">--}}
            {{--<input type="text" placeholder="Вартість консультації" class="form-control" name="cost"--}}
            {{--value="{{ old('cost') }}">--}}
            {{--</div>--}}
            {{--</div>--}}

            <div class="form-group row">
                <label for="description" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.description') }}
                </label>
                <div class="col-md-5">
                    <textarea rows="5" cols="40" placeholder="{{ trans('main.description') }}" class="form-control"
                              name="description"
                              value="{{ old('description') }}"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="time_start" class="col-md-3 col-sm-5 label-text-company">
                    Виберiть початкову дату:
                </label>
                <div class='input-group date col-md-5 col-sm-6' id='datetimepicker6'>
                    <input type='text' class="form-control" name="time_start" id="time_start"
                           value="{{old('time_start')}}"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="time_end" class="col-md-3 col-sm-5 label-text-company">
                    Виберiть кiнцеву дату:
                </label>
                <div class='input-group date col-md-5 col-sm-6' id='datetimepicker7'>
                    <input type='text' class="form-control" name="time_end" id="time_end"
                           value="{{old('time_end')}}"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>

            @if(!$resumes->isEmpty())
            <div class="form-group row">
                <label for="resume" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.resume') }}
                </label>
                <div class="col-md-5 col-sm-5">
                    <select class="inputPlace2" id="resume_id" name="resume">
                        @foreach($resumes as $resume)
                            <option value="{{$resume->id}}">{{$resume->position}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @else
            <div class="form-group row">
                <div class="col-md-5">
                    <label>У Вас ще немає резюме</label><br>
                    <a href="{{action("ResumeController@create")}}">
                        <button type="button"  class="btn btn-green btn-large">Створити резюме</button>
                    </a>
                </div>
            </div>
            @endif

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="img">Ваш аватар ще не працює</label>
                    <input id="image" type="file" name="img">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <button type="submit" tabindex="1" class="btn btn-primary">
                        {{ trans('auth.signup') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@stop

