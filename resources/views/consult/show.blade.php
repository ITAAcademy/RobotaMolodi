


@extends('app')

    <link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">

@section('content')

    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
               ['url'=> 'head','name'=>'Головна'],
               ['name' => 'Радник: ' , 'url' => false]
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
                    {{--@if($vacancy->published == '1')--}}
                        @include('newDesign.socialModule.share-btn-block' , ['url' => URL::current()])
                    {{--@endif--}}
                </div>




            </div>
            <div class="col-md-10" style="margin: 0;">
                <div id="datAnnoyingSizes">

                    <div class="panel-headings">

                        <strong>Name and Surname</strong>
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
                           <span> Any industries</span>
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
                            <span class="anagraph">{{ trans('consult.resume') }} </span>
                            <br>
                            <span>Some test text</span>
                            {{--{!! strip_tags($vacancy->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</div>--}}
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>

    @stop