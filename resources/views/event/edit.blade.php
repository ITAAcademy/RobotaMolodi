@extends ('NewVacancy/users')
<link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
<link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
<link href="{{ asset('/css/cabinet.css') }}" rel="stylesheet">
<link href="{{ asset('/css/styleValidation.css') }}" rel="stylesheet">
<link href="{{ asset('/css/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ asset('/css/sortAds/calendarDatepicker.css') }}" rel="stylesheet">

@section('content')
    <div class="content">
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
            <h3 class="formTitle header-text-company"><b>{{ trans('content.editConsultant') }}</b></h3>
        </div>
        {!! Form::open(['route' =>['events.update',$consultant->id],'method'=>'PUT',"id"=>"consultEdit"]) !!}

        <div class="row form-company-row">
            <label for="telephone" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.phone') }}
            </label>
            <div class="col-md-6 col-sm-6">
                <input type="text" placeholder="(XXX) XXX-XX-XX" class="form-control" name="telephone"
                       value="{{$consultant->telephone}}" id="telephone">
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
                        @if($city->name == $consultant->city){
                        <option value="{{$city->name}}" selected>{{$city->name}}</option>
                        }
                        @else{
                        <option value="{{$city->name}}">{{$city->name}}</option>}
                        @endif
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
                        @if($industry->name == $consultant->area){
                        <option value="{{$industry->name}}" selected>{{$industry->name}}</option>
                        }
                        @else{
                        <option value="{{$industry->name}}">{{$industry->name}}</option>}
                        @endif
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
                       value="{{$consultant->position}}" id="positionCon">
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
                        @if($currency->id == $consultant->currency_id){
                        <option value="{{$currency->id}}" selected>{{$currency->currency}}</option>
                        }
                        @else{
                        <option value="{{$currency->id}}">{{$currency->currency}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-4">
                <input type="number" min="0"  placeholder=" {{ trans('main.value') }}" class="form-control" name="value"
                       value="{{$consultant->value}}" id="value">
            </div>
            <span class="red-star"> * </span>
        </div>

        <div class="row form-company-row">
            <label for="description" class="col-md-3 col-sm-3 label-text-company">
                {{ trans('main.description') }}
            </label>
            <div class="col-md-6 col-sm-6">
                    <textarea rows="5" cols="40" placeholder="{{ trans('main.description') }}" class="form-control"
                              name="description" id="description">{{ $consultant->description}}</textarea>
            </div>
            <span class="red-star"> * </span>
        </div>

        @if(!$resumes->isEmpty())
            <br>
            <div class="row form-company-row marg-top">
                <label for="resume_id" class="col-md-3 col-sm-3 label-text-company">
                    {{ trans('main.resume') }}
                </label>
                <div class="col-md-6 col-sm-6">
                    <select class="inputPlace2" id="resume_id" name="resume_id">
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
            <br>
            <div class="row form-company-row ">
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
            <div id='calendar_edit' data-consult-id="{{$consultant->id}}"></div>
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
                                    <label class="col-xs-4" for="time_start">{{ trans('consult.start') }}</label>
                                    <input type="text" name="time_start" id="time_start"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="col-xs-4" for="time_end">{{ trans('consult.end') }}</label>
                                    <input type="text" name="time_end" id="time_end"/>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">{{ trans('consult.close') }}</button>
                            <button type="button" class="btn btn-primary"
                                    id="save-event">{{ trans('consult.save') }}</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <br>
        <div class="row">
            <div class="col-sm-offset-3 col-md-9 col-sm-9">
                <input class="btn btn-primary" type="submit" value="{{ trans('form.saveChanges') }}">
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <?php $lan = App::getLocale();?>
    <script> var lan = "<?php echo($lan);?>";</script>
    <script type="text/javascript" src="{{ asset('/js/consult/consult_edit/calendar_consult_edit.js') }}"
            defer></script>
    <script type="text/javascript" src="{{ asset('/js/consult/consult_edit/consult_edit_valid.js') }}"
            crossorigin="anonymous" defer></script>
    <script type="text/javascript" src="{{ asset('/js/fullcalendar/fullcalendar.min.js') }}" crossorigin="anonymous"
            defer></script>
    <script type="text/javascript" src="{{ asset('/js/fullcalendar/uk.js') }}"defer></script>

    <script>
        $(document).ready(function () {
            calendar_consult_edit('#calendar_edit');
        })
    </script>

@stop

