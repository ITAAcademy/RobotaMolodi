@extends('app')
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
<link href="{{ asset('/css/styleValidation.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sortAds/calendarDatepicker.css') }}" rel="stylesheet">

@section('content')

    @if ($errors->any())
        <div class="err-info">
            <ul>
                @foreach ($errors->all() as $error)
                    <span class="err-message"> <li>{{ $error }}</li></span>
                @endforeach
            </ul>

        </div>
    @endif
    <div class="l-header-text-company">
        <h3 class="formTitle header-text-company"><b>{{ trans('content.addConsultant') }}</b></h3>
    </div>
    <form class="form" role="form" method="POST" id="consultCreate" action="{{ url('/cabinet/consult') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="row form-company-row">
            <label for="telephone" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.phone') }}
            </label>
            <div class="col-md-6 col-sm-6">
                <input type="text" placeholder="(XXX) XXX-XX-XX" class="form-control" name="telephone"
                       value="{{ old('phone') }}" id="telephone">
            </div>
            <span class="red-star"> * </span>
        </div>
        {!!Html::script('js/jquery.maskedinput.min.js')!!}
        <script type="text/javascript">
            $(document).ready(function () {
                $("#telephone").mask("(099) 999-99-99");
            });
        </script>
        <div class="row form-company-row">
            <label for="city" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.city') }}
            </label>
            <div class="col-md-6 col-sm-6">
                <select class="inputPlace2" id="city_id" name="city">
                    @foreach($cities as $city)
                        <option value="{{$city->name}}">{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
            <span class="red-star"> * </span>
        </div>

        <div class="row form-company-row">
            <label for="area" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.area') }}
            </label>
            <div class="col-md-6 col-sm-6">
                <select class="inputPlace2" id="industry_id" name="area">
                    @foreach($industries as $industry)
                        <option value="{{$industry->name}}">{{$industry->name}}</option>
                    @endforeach
                </select>
            </div>
            <span class="red-star"> * </span>
        </div>

        <div class="row form-company-row">
            <label for="position" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.position') }}
            </label>
            <div class="col-md-6 col-sm-6">
                <input type="text" placeholder=" {{ trans('main.position') }}" class="form-control" name="position"
                       value="{{ old('position') }}" id="positionCon">
            </div>
            <span class="red-star"> * </span>
        </div>

        <div class="row form-company-row">
            <label for="value" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.value') }}
            </label>

            <div class="col-md-2 col-sm-2">
                <select class="form-control input" id="currency_id" name="currency_id">
                    @foreach($currencies as $currency)
                        <option value="{{$currency->id}}">{{$currency->currency}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-4">
                <input type="number" min="0" placeholder=" {{ trans('main.value') }}" class="form-control" name="value"
                       value="{{ old('value') }}" id="value">
            </div>
            <span class="red-star"> * </span>
        </div>

        <div class="row form-company-row">
            <label for="description" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.description') }}
            </label>
            <div class="col-md-6 col-sm-6">
                    <textarea rows="5" cols="40" placeholder="{{ trans('main.description') }}" class="form-control"
                              name="description" id="description"></textarea>
            </div>
            <span class="red-star"> * </span>
        </div>

        @if(!$resumes->isEmpty())
            <br>
            <div class="row form-company-row">
                <label for="resume_id" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.resume') }}
                </label>
                <div class="col-md-6 col-sm-6">
                    <select class="inputPlace2" id="resume_id" name="resume_id">
                        @foreach($resumes as $resume)
                            <option value="{{$resume->id}}">{{$resume->position}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @else
            <br>
            <div class="row form-company-row">
                <label for="resume_id" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.no_res') }}
                </label>
                <div class="col-md-6 col-sm-6">
                    <a href="{{action("ResumeController@create")}}">
                        <button type="button" class="btn btn-large">{{ trans('main.create_res') }}</button>
                    </a>
                </div>
            </div>
        @endif
        <div class="row form-company-row">
            <label for="img" class="col-md-3 col-sm-3 label-text-company">{{ trans('consult.ava') }}</label>
            <div class="col-md-6 col-sm-6 container3">
                <input id="img" type="file" name="img" accept=".JPG, .jpg, .jpeg, .png, .gif">
            </div>
        </div>
        <br>
        <div id="error_calendar"></div>
        <div class="row form-company-row" id="calendar_consult">
            <div id='calendar2'></div>

            <div class="modal fade" tabindex="-1" role="dialog" id="modalCal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">{{ trans('consult.cr_new') }}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="date_cons">{{ trans('consult.date') }}</label>
                                    <input type="text" name="date_cons" id="date_cons"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="time_start">{{ trans('consult.start') }}</label>
                                    <input type="time" name="time_start" id="time_start"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="time_end">{{ trans('consult.end') }}</label>
                                    <input type="time" name="time_end"  id="time_end"/>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn fa orange-button"
                                    data-dismiss="modal">{{ trans('consult.close') }}</button>
                            <button type="button" class="btn fa orange-button" disabled="true"
                                    id="save-event" >{{ trans('consult.save') }}</button>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <br>
        <div class="row">
            <div class="col-sm-offset-4 col-md-9 col-sm-9">
                <input class="btn btn-primary" type="submit" value="{{ trans('form.regConsultant') }}">
            </div>
        </div>
    </form>


    <?php $lan = App::getLocale();?>
    <script> var lan = "<?php echo($lan);?>";</script>
    <script type="text/javascript" src="{{ asset('/js/consult/consult_create/calendar_consult_create.js') }}"defer></script>
    <script type="text/javascript" src="{{ asset('/js/consult/consult_create/consultValidation.js') }}" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="{{ asset('/js/fullcalendar/fullcalendar.min.js') }}" crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="{{ asset('/js/fullcalendar/uk.js') }}"defer></script>
    <script>
        $(document).ready(function () {
            calendar_consult_create('#calendar2');

        })
    </script>
@stop

