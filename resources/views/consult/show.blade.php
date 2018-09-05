


@extends('app')

    <link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}' />

@section('content')

    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
               ['url'=> 'head','name'=>'Головна'],
               ['name' => trans('consult.consult').$consultant->consult->name , 'url' => false]
               ]
           )
           )

    <div class="panel panel-orange" id="vrBlock">
        <div class="row">

            <div class="col-md-2">
                <div class="logos">
                    <div class="panel panel-orange" id="vimg">
                        {{--@if(File::exists(public_path('image/resume/'.$resume->user_id.'/'.$resume->image)))--}}
                            {{--{!! Html::image('image/resume/'.$resume->user_id.'/'.$resume->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}--}}
                        {{--@else--}}
                            {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                        {{--@endif--}}

                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-10 consult">
                            <div class="col-xs-2 case-img">
                                <i class="fa vacancy">&#xf0b1;</i>
                            </div>

                            <a href="javascript:alert( {{ trans('main.dosent') }} )">{{ trans('vacancy.plan_consultation') }}</a>
                        </div>
                    </div>

                        @include('newDesign.socialModule.share-btn-block' , ['url' => URL::current()])

                </div>




            </div>
            <div class="col-md-10" style="margin: 0;">
                <div id="datAnnoyingSizes">

                    <div class="panel-headings">

                        <strong> {{$consultant->consult->name}}</strong>
                    </div>


                    <div class="ratings text_vac">
                        <span class = "ratingsTitle">{{ trans('content.rating') }}</span>
                        <span class="morph">
                            {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                            <span class="findLike" >5</span>
                        </span>
                        <span class="morph">
                            {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                            <span class="findDislike" >-1</span>
                        </span>
                        <span class="likeError"></span>
                    </div>

                    <div>
                        <div class="ratings text_cons">
                            <span>{{ trans('form.branch') }} </span>
                           <span> {{$consultant->area}}</span>
                            {{--{!! Html::linkRoute('vacancy.showVacancies', $industry->name, [ 'name' => 'industries', 'value' => $industry->id], ['class' => 'orangeLinks', 'tabindex' => 1 ]) !!}--}}
                        </div>
                    </div>
                    <div>
                        <div class=" text_vac">
                            <span>{{ trans('consult.cost') }}</span>
                            <span class="seleryvacancy">2000</span>
                            {{--<span class="seleryvacancy">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span> --}}
                        </div>
                    </div>

                    <div>
                        <div class="descriptionStyle">
                            <span class="anagraph">{{ trans('consult.experience') }} </span>
                            <br>
                            <span>{{$consultant->description}}</span>
                            {{--{!! strip_tags($vacancy->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</div>--}}
                    </div>
                    <div class="conslink">
                        <a  href='javascript:alert( {{ trans('main.dosent') }} )' class='alfa'>{{ trans('consult.resume') }} </a>
                    </div>

                </div>
            </div>


        </div>
        <br>
    </div>

        <div class="row">
        <div id="calendar" data-consult-id="{{$consultant->id}}"></div>
            {{--<div id="resp"></div>--}}
            <div id="dialog">
                <form id="submitEventForm"  >

                    <div class="form-group">
                        <span>Час початку: </span>
                        <span id="spstart"></span>

                    </div>
                    <div class="form-group">
                        <span>Час закінчення: </span>
                        <span id="spend"></span>

                    </div>

                    <div class="form-group">
                    <input type="hidden"  id="cons_id" value="{{$consultant->id}}">
                        <input type="hidden"  id="starts-at" >
                        <input type="hidden" id="ends-at"  >
                    </div>
                    <button type="submit" class="btn btn-success" id="submitButton">{{ trans('consult.plan') }}</button>

                </form>

            </div>
         </div>
        <br>
    </div>
    <script src='{{ asset('/js/fullcalendar/fullcalendar.min.js') }}'></script>
    <script src='{{ asset('/js/initCalendar.js') }}'></script>
    <script>
        $(document).ready(function() {
             initCalendar('#calendar');

        });

    </script>
@stop


