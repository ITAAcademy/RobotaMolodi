


@extends('app')

    <link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='{{ asset('/css/fullcalendar/fullcalendar.css') }}' />

@section('content')
    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
               ['url'=> 'head','name'=>'Головна'],
               ['name' => trans('consult.consult').$consultant->userName , 'url' => false]
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

                            <a href="#calendar">{{ trans('vacancy.plan_consultation') }}</a>
                        </div>
                    </div>

                        @include('newDesign.socialModule.share-btn-block' , ['url' => URL::current()])

                </div>




            </div>
            <div class="col-md-10" style="margin: 0;">
                <div id="datAnnoyingSizes">

                    <div class="panel-headings">

                        <strong> {{$consultant->userName()}}</strong>
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
                    <!-- <div>
                        <div class=" text_vac">
                            <span>{{ trans('main.value') }}: </span>
                            <span class="seleryvacancy">{{$consultant->value}} {{$consultant->currency->currency}}</span>
                        </div>
                    </div> -->

                    <div>
                        <div class="descriptionStyle">
                            <span class="anagraph">{{ trans('consult.experience') }} </span>
                            <br>
                            <span>{{$consultant->description}}</span>
                           
                    </div>
                    <div class="conslink">
                        <a  href='/resume/{{$consultant->resume_id}}' class='alfa'>{{ trans('consult.resume') }} </a>
                    </div>

                </div>
            </div>


        </div>
        <br>
    </div>

        <div class="row">
        <div id="calendar" data-consult-id="{{$consultant->id}}"></div>

            <!-- Central Modal Medium Warning -->
            <div class="modal fade" id="centralModalWarning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-notify modal-warning" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            {{--<p class="heading lead">Modal Warning</p>--}}

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="text-center">
                                {{--<i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>--}}
                                <p >{{ trans('consult.possibility') }} {{$consultant->consult->name}} {{ trans('consult.confirm') }} </p>
                               {{--<p id="spstart"></p>--}}
                                {{--<p id="spend"></p>--}}
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <form>
                                <input type="hidden"  id="time_consultation_id" >
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <button type="submit" class="btn btn-warning" id="submitButton">{{ trans('consult.action') }}<i class="fa fa-calendar-plus-o"></i></button>
                                {{--<a type="button" class="btn btn-warning">{{ trans('consult.action') }} <i class="fa fa-calendar-plus-o"></i></a>--}}
                                <a type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">No, thanks</a>
                            </form>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!-- Central Modal Medium Warning-->

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


