@extends('app')
<link href="{{ asset('/css/style_resume.css') }}" rel="stylesheet">
@section('content')

    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
        ['url'=> 'head','name'=>'Головна'],
        ['name' => 'Резюме: '.$resume->position, 'url' => false]
        ]
    )
    )
    <div class="panel panel-orange" id="vrBlock">
        <div>
            <div class="col-md-3">
                <div class="panel panel-orange" id="vimg">
                    @if(File::exists(public_path('image/resume/'.$resume->id_u.'/'.$resume->image)))
                        {!! Html::image('image/resume/'.$resume->id_u.'/'.$resume->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                    @else
                        {!! Html::image('image/m.jpg', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
                    @endif
                </div>
            </div>

            <div id="datAnnoyingSizes">
                <div class="panel-heading">
                    <p class="position_resume">
                        <a tabindex="1" class="orangColor-resume-name" href="javascript:submit('selectSpecialisation', '{{$resume->position}}')">{!!$resume->position!!}</a>
                    </p>
                    <p class="price_resume">
                        {{$resume->salary}} - {{$resume->salary_max}} {{$resume->Currency()[0]['currency']}}
                    </p>
                    <p class="name_resume">{!!$resume->name_u!!}</p>
                    </br>
                </div>

                <div class="ratings">
                    <span class = "ratingsTitle">Рейтинг:</span>
                    <span class="morph">
                        {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike', 'id'=>'like']) !!}
                        <span class="findLike" id="{{$resume->id}}_1">{{$countLike}}</span>
                    </span>
                    <span class="morph">
                        {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike', 'id'=>'dislike']) !!}
                        <span class="findDislike" id="{{$resume->id}}_-1">{{$countDisLike}}</span>
                    </span>
                    <span class="likeError"></span>
                </div>

                <div class="panel-description-resume">
                    <p class="position_resume"><a tabindex="1" class="orangColor-resume" href="javascript:submit('selectIndustry','{{$resume->Industry()->id}}')">{!!$resume->Industry()->name!!}</a></p>

                    <p class="phone-nomber-resume"><span>Телефон: </span> {!!$resume->telephone!!}</p>

                    <p><span class="description-one-resume">Опис: </span></p>
                    <p class="description-footer-resume"> {!!strip_tags($resume->description)!!}</p>

                    <div class="button-city-time">
                        <p class="cityTime_resume">
                            <a class="orangColor-resume" href="javascript:submit('selectCity', '{{$city->id}}')">{!!$city->name!!}</a>
                            <span id="yellowCircle-resume">&#183;</span>
                            {{ date('j m Y', strtotime($resume->updated_at))}}
                        </p>
                        <a id="writeOnPost" href="{{$resume->id}}/send_message">
                           <div class="writeOnPost">НАПИСАТИ НА ПОШТУ</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::check()) @if(Auth::user()->role_id ==1)<div><button class="btn btn-default" style="background: #f48952; margin-left: 50px" onclick="blockResume()">Заблокувати</button></div>@endif @endif

    <script>
        function blockResume() {
            var dialogResult = confirm("Ви дійсно бажаєте заблокувати резюме?");
            if(dialogResult) {
                $.post( '/resume/block',{_token: '{{ csrf_token() }}', id: '{{ $resume->id }}' },
                    function( data ) {
                    location="{{URL::to('resume')}}";
                });
            }
        }
    </script>

    <script>
        $('.likeDislike').click(function (e) {
            e.preventDefault();
            $('.likeError').text("Увійдіть або зареєструйтесь!").css('color', 'red').animate({color: "white"}, "slow");
        });
    </script>

@stop