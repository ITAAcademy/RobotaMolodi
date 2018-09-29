@extends('app')
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
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
        {!! Form::open(['route' =>['events.update',$consultant->id],'method'=>'PUT',"id"=>"consultEdit"]) !!}

            <div class="form-group row">
                <label for="telephone" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.phone') }}
                </label>
                <div class="col-md-5">
                    <input type="text" placeholder="{{ trans('main.phone') }}" class="form-control" name="telephone"
                           value="{{$consultant->telephone}}" id="telephone">
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
                           value="{{$consultant->position}}" id="positionCon">
                </div>
            </div>

            <div class="form-group row">
                <label for="value" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.value') }}
                </label>
                <div class="col-md-4">
                    <input type="number" placeholder=" {{ trans('main.value') }}" class="form-control" name="value"
                           value="{{$consultant->value}}" id="value">
                </div>
                <div class="col-sm-1">
                    <select class="form-control input-sm" id="currency_id" name="currency">
                        @foreach($currencies as $currency)
                            @if($currency->id == $consultant->currency_id){
                            <option value="{{$currency->id}}" selected>{{$currency->currency}}</option>
                            }
                            @else{
                            <option value="{{$currency->id}}">{{$currency->currency}}</option>
                            @endif
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
                              name="description" id="description">{{ $consultant->description}}</textarea>
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
                                @if($resume->id == $consultant->resume_id){
                                <option value="{{$resume->id}}" selected>{{$resume->position}}</option>
                                }
                                @else{
                                <option value="{{$resume->id}}">{{$resume->position}}</option>
                                @endif
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

        <div class="form-group row" id="calendar_consult">

            <div id='calendar_edit' data-consult-id="{{$consultant->id}}"></div>
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



            <div class="form-group row">
                <div class="container">
                    <button type="submit" tabindex="1" class="btn-lg fa orange-button" >
                        Зберегти
                    </button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>

    <script type="text/javascript" src="{{ asset('/js/consult/consult_edit/calendar_consult_edit.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/consult/consult_edit/consult_edit_valid.js') }}" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="{{ asset('/js/fullcalendar/fullcalendar.min.js') }}" crossorigin="anonymous" defer></script>

    <script>
        $(document).ready(function () {
            calendar_consult_edit('#calendar_edit');
        })
    </script>
@stop

