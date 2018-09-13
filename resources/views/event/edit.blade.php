@extends('app')
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
@section('content')
    <div class="content">
        {!! Form::open(['route' =>['events.update',$consultant->id],'method'=>'PUT']) !!}

            <div class="form-group row">
                <label for="telephone" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.phone') }}
                </label>
                <div class="col-md-5">
                    <input type="text" placeholder="{{ trans('main.phone') }}" class="form-control" name="telephone"
                           value="{{$consultant->telephone}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.city') }}
                </label>
                <div class="col-md-5 col-sm-5">
                    <select class="inputPlace2" id="city_id" name="city">
                        @foreach($cities as $city)
                            @if($city->name == $consultant->city){
                            <option value="{{$city->name}}" selected>{{$city->name}}</option>
                            }
                            @else{
                            <option value="{{$city->name}}">{{$city->name}}</option>}
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="area" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.area') }}
                </label>
                <div class="col-md-5 col-sm-5">
                    <select class="inputPlace2" id="industry_id" name="area">
                        @foreach($industries as $industry)
                            @if($industry->name == $consultant->area){
                            <option value="{{$industry->name}}" selected>{{$industry->name}}</option>
                            }
                            @else{
                            <option value="{{$industry->name}}">{{$industry->name}}</option>}
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="position" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.position') }}
                </label>
                <div class="col-md-5">
                    <input type="text" placeholder=" {{ trans('main.position') }}" class="form-control" name="position"
                           value="{{$consultant->position}}">
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
                              name="description">{{ $consultant->description}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="time_start" class="col-md-3 col-sm-5 label-text-company">
                    Виберiть початкову дату:
                </label>
                <div class='input-group date col-md-5 col-sm-6' id='datetimepicker6'>
                    <input type='text' class="form-control" name="time_start" id="time_start"
                           value="{{$timecons->time_start}}"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>

            <div class="form-group row">
                <label for="time_end" class="col-md-3 col-sm-5 label-text-company">
                    Виберiть кiнцеву дату:
                </label>
                <div class='input-group date col-md-5 col-sm-6' id='datetimepicker7'>
                    <input type='text' class="form-control" name="time_end" id="time_end"
                           value="{{$timecons->time_end}}"/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
            </div>

            <input type='hidden' name="time_id" value="{{$timecons->id}}"/>

            <div class="form-group row">
                <div class="container">
                    <button type="submit" tabindex="1" class="btn-lg fa orange-button">
                        Зберегти
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@stop

