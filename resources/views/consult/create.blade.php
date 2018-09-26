@extends('app')
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
<link href="{{ asset('/css/styleValidation.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fullcalendar/fullcalendar.css') }}" rel="stylesheet">

@section('content')

    <div class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="form" role="form" method="POST" id="consultCreate" action="{{ url('/cabinet/consult') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="form-group row">
                <label for="telephone" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.phone') }}
                </label>
                <div class="col-md-5">
                    <input type="text" placeholder="{{ trans('main.phone') }}" class="form-control" name="telephone"
                           value="{{ old('phone') }}" id="telephone">
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
                           value="{{ old('position') }}" id="positionCon">
                </div>
            </div>

            <div class="form-group row">
                <label for="value" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.value') }}
                </label>
                <div class="col-md-4">
                    <input type="number" placeholder=" {{ trans('main.value') }}" class="form-control" name="value"
                           value="{{ old('value') }}" id="value">
                </div>
                <div class="col-sm-1">
                    <select class="form-control input-sm" id="currency_id" name="currency">
                        @foreach($currencies as $currency)
                            <option value="{{$currency->id}}">{{$currency->currency}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.description') }}
                </label>
                <div class="col-md-5">
                    <textarea rows="5" cols="40" placeholder="{{ trans('main.description') }}" class="form-control"
                              name="description"
                              value="{{ old('description') }}" id="description"></textarea>
                </div>
            </div>

            @if(!$resumes->isEmpty())
            <div class="form-group row">
                <label for="resume_id" class="col-md-3 col-sm-3 label-text-company">
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

            <div class="form-group row" id="calendar_consult">

            <div id='calendar2'></div>
            <div id='datepicker'></div>

            <div class="modal fade" tabindex="-1" role="dialog" id="modalCal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Create new event</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="time_start">Starts at</label>
                                    <input type="text" name="time_start" id="time_start" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="time_end">Ends at</label>
                                    <input type="text" name="time_end" id="time_end" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="save-event">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </div>
            {{--<input type="hidden" value="" id="input_hidden_field_obj" />--}}
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="img">Ваш аватар ще не працює</label>
                    <input id="image" type="file" name="img">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <button type="submit" tabindex="1" class="btn btn-primary btn-block" id="consultSubmit">
                        {{ trans('auth.signup') }}
                    </button>
                </div>
            </div>
        </form>


    </div>
    <script type="text/javascript" src="{{ asset('/js/calendar_consult_create.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/consultValidation.js') }}" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="{{ asset('/js/fullcalendar/fullcalendar.min.js') }}" crossorigin="anonymous" defer></script>

    <script>
        $(document).ready(function () {
            calendar_consult_create('#calendar2');

        })
    </script>
@stop

