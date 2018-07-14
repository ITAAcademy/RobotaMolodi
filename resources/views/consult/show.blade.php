


@extends('app')

    <link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/consult.css') }}" rel="stylesheet">
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
                    {{--@if($vacancy->published == '1')--}}
                        @include('newDesign.socialModule.share-btn-block' , ['url' => URL::current()])
                    {{--@endif--}}
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
            <hr class="gray-line">

            <div class="col-lg-4">
                <div class="date-consult-card size-first-card">
                    <div class="type-card-text">Виберiть тип:</div>
                    <span class="offline">
                    <img src={{asset('image/consult/coffee.png')}}>
                    офлайн:
                    <p class="p-card-text"> м. Iвано-Франкiвськ</p>
                    <p class="p-card-text"> вул. Князя Святослава, 12а, «Lylo»</p>
                </span>
                    <span class="offline">
                    <img src={{asset('image/consult/on-line.png')}}>
                    онлайн:
                    <div class="p-card-text p-card-underline">
                        <img src={{asset('image/consult/skype.png')}}>
                        Skype
                        <span class="p-card-text p-card-underline">
                            <img src={{asset('image/consult/Hangouts.png')}}>
                            Hangouts
                        </span>
                    </div>
                    <span class="p-card-text p-card-underline" style="margin-left: 100px; ">
                        <img src={{asset('image/consult/facebook.png')}}> FB
                    </span>
                    <span class="p-card-text p-card-underline">
                        <img src={{asset('image/consult/watshapp.png')}}> Mesenger
                    </span>
                </span>

                    <hr class="orange-line">

                    <div class="type-card-text" style="padding-top: 0px;">
                        Виберіть день
                    </div>
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div id="datetimepicker"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="date-consult-card size-second-card">
                    <div class="type-card-text">Виберіть годину</div>
                    <div class="time-slot">29 лютня 2015 року</div>
                    <div><img src="{{asset('image/consult/block-time-slot.png')}}"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="date-consult-card size-third-card">
                    <div class="type-card-text" style="padding-left: 123px;">Оплата</div>
                    <span class="offline">
                        <p class="payment-text"> 29 лютня 2015 року з 18:20 по 19:00 у вас запланована консультація у радника кар’эри:</p>
                        <p class="payment-text bold-name"> Oреста Остаповича Лютого.</p>
                    </span>
                    <div class="pay"> 569 грн</div>

                    <hr class="gray-line" style="margin: 8px">

                    <p class="orange-text-pay">
                        Натисніть на кнопку "Сплатити рахунок", щоб перейти на сторінку вибора оплати.
                        Після оплати рахунка Вам автоматично буде надано доступ до навчання.
                    </p>

                    <hr class="gray-line" style="margin: 8px">

                    <p class="orange-text-pay">Доступні способи платежу</p>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="payment-methods"> 1. Банківською картою MasterCard, Visa та різними іншими </p>
                            <p class="payment-methods"> 2. Терминалами QIWI, Элекснет, Мобил Элемент</p>
                            <p class="payment-methods"> 3. Електричними гаманцями Webmoney, Яндекс.Деньги</p>
                            <p class="payment-methods"> 5. Інтернет-банк Прихват25, ВТБ24</p>
                        </div>
                        <div class="col-md-4">
                            <img src={{asset('image/consult/ico.png')}}>
                        </div>
                    </div>
                    <button type="button" class=" btn orange-button-pay">
                        <p class="pay-word">
                            Сплатити
                        </p>
                    </button>
                </div>
            </div>
        </div>
        <br>
    </div>
@stop


