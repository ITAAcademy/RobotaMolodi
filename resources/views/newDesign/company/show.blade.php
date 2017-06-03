@extends('app')
@section('head')

<link href="{{ asset('/css/oneCompany.css') }}" rel="stylesheet">
@stop
@section('content')
    @include('newDesign.scrollup')

    @include('newDesign.breadcrumb',array('breadcrumbs' =>[
       ['url'=> 'head','name'=>'Головна'],
       ['name' => 'Компанія: '.$company->company_name, 'url' => false]
       ]
   )
   )
        <div class="row">
            <div class="col-md-2">
                <div class="logos">
                    <div class="panel panel-orange" id="vimg">
                        @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)) and $company->image != '')
                            {!! Html::image('image/company/' . $company->users_id .'/'. $company->image, 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            <h3 class="nologo">логотип вiдсутнiй</h3>
                        @endif
                    </div>
                    <div class="case">

  						<span>
  							<i class="fa newFa">&#xf0b1;</i>
  						</span>
                    <div class="consult">
                        <a href="#">запланувати консультацію</a>
                    </div>
                </div>
                <div class="share">
                    <p>Поділитись</p>
                </div>
                <div class="social">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&amp&title=Компанія{{' '.$company->company_name}}&url=http://robotamolodi.org/company/{{$company->id}}" target="_blank"><i class="fa">&#xf08c;</i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://robotamolodi.org/company/{{$company->id}}&title=Компанія{{' '.$company->company_name}}" target="_blank"><i class="fa">&#xf082;</i></a>
                    <a href="https://www.twitter.com/intent/tweet?url=http://robotamolodi.org/company/{{$company->id}}&text=Компанія{{' '.$company->company_name}}" target="_blank"><i class="fa">&#xf081;</i></a>
                    <a href="http://vk.com/share.php?url=http://robotamolodi.org/company/{{$company->id}}&title=Компанія{{' '.$company->company_name}}&image=http://robotamolodi.org/image/logo.png" target="_blank"><i class="fa" >&#xf189;</i></a>
                    <a href="https://plus.google.com/share?url=http://robotamolodi.org/company/{{$company->id}}" target="_blank"><i class="fa fa-google-plus-square"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-10 contentConpany">

                <div class="panelHeadings">
                    <div class="textCompany"><a class="greyLinks" href="javascript:submit('companies' {{$company->id}})">{{$company->company_name}}</a> </div>
                </div>

                <div class="row textCompany verticalIndent">

                    <div class="col-xs-3">
                        <span>Рейтинг: </span>
                    </div>

                    <div class="col-xs-9 ratings">
                        <span class="morph">
                            {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike', 'style'=>'padding:6px 0px 6px 6px']) !!}
                            <span class="findLike" id="{{$company->id}}_1">{{$countLike}}</span>
                        </span>
                        <span class="morph">
                            {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike', 'style'=>'padding:6px 0px 6px 6px']) !!}
                            <span class="findDislike" id="{{$company->id}}_-1">{{$countDisLike}}</span>
                        </span>
                        <span class="likeError"></span>
                    </div>

                    <?php  $ratingObjectId = isset($company)?$company->id:''?>

                    <script>
                        "use strict";
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $('.likeDislike').click(function (e) {
                            e.preventDefault();

                            var log = new Boolean({!! Auth::check() !!});

                            if (log != 1) {
                                $('.likeError').text("Увійдіть або зареєструйтесь!").css('color', 'red').animate({color: "white"}, "slow");
                                return false;
                            }

                            this.parentElement.parentElement.setAttribute('id', 'pointer');
                            var current = this.nextElementSibling.id;
                            var like = document.querySelector('#pointer .findLike');
                            var dislike = document.querySelector('#pointer .findDislike');


                            $.ajax({
                                url: '{{ route('evaluation', $ratingObjectId) }}',
                                method: 'POST',
                                data: {'mark': current.split('_')[1]},
                                success: function (data) {
                                    if(data.error != undefined) {
                                        console.log("Помилка передачі даних: " + data.error);
                                    }else {
                                        like.innerHTML = (data.countLike);
                                        dislike.innerHTML = (data.countDisLike);
                                    }
                                }
                            });
                            document.getElementById("pointer").removeAttribute("id");
                        });
                    </script>

                    <style>
                        .morph {
                            margin-right: 10px;
                        }
                        .likeDislike {
                            -webkit-filter: brightness(100%);
                        }
                        .likeDislike:active {
                            -webkit-filter: brightness(145%);
                        }
                    </style>

                    <div class="col-xs-3">
                        <span>Аббревиатура: </span>
                    </div>
                    <div class="col-xs-9">
                        <span>{{$company->short_name}}</span>
                    </div>

                    <div class="col-xs-3">
                        <span>Галузь: </span>
                    </div>
                    {{--<div class="col-xs-9">--}}
                        {{--<span>{{$industry->name}}</span>--}}
                    {{--</div>--}}

                    @if(!empty($company->link))
                        <div class="col-xs-3">
                            <span>Посилання: </span>
                        </div>
                        <div class="col-xs-9">
                            <a class="orangeLinks" href="{{$company->link}}">{{$company->link}}</a>
                        </div>
                    @endif

                    <div class="col-xs-3">
                        <span>Мiсто: </span>
                    </div>
                    {{--<div class="col-xs-9">--}}
                        {{--<span>{{$city->name}}</span>--}}
                    {{--</div>--}}

                    <div class="col-xs-3">
                        <span>Електронна пошта: </span>
                    </div>
                    <div class="col-xs-9">
                        <span>{{$company->company_email}}</span>
                    </div>

                    <div class="col-xs-3">
                        <span>Телефон: </span>
                    </div>
                    <div class="col-xs-9">
                        <span>{{$company->phone}}</span>
                    </div>

                    <div class="col-xs-12 textCompany verticalIndent">
                        <span class="anagraph verticalIndent">Подробиці </span>
                    </div>
                    <div class="col-xs-12 description">
                       <span>{!! $company->description !!}</span>
                    </div>


                    <div class="col-xs-12 textCompany verticalIndent">
                        <span class="anagraph verticalIndent">Вакансії </span>
                        @if(!empty($vacancies[0]))
                            @foreach($vacancies as $vacancy)
                                <div class="description">
                                    <a class="links" href="/vacancy/{{$vacancy->id}}">
                                        {{ $vacancy->position}}
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p>Вакансії відсутні</p>
                        @endif
                    </div>

                </div>

            <hr/>

            <div class="col-xs-12 configButton">
                @if(Auth::check() && Auth::id() == $company->users_id)
                <a href="{{$company->id}}/destroy" class="btn-default btn" onclick="return ConfirmDelete();">Видалити</a>
                <a href="{{$company->id}}/edit" class="btn-default btn">Редагувати</a>
                @endif
                <a href="{{route('company.response.index',$company->id)}}" class="response-call btn-default btn">Відгукнутись</a>
                <a href="{{route('scompany.company_formSendFile',$company->id)}}" class="file-call btn-default btn">Відправити файл</a>
                <a href="{{route('scompany.company_formSendResume',$company->id)}}" class="resume-call btn-default btn">Відправити резюме</a>
            </div>

        </div>
    </div>

    <div class="downlist"></div>

    {!!Html::script('js/socialNetWork.js')!!}

    <script>
        socialNetWork('.social > a');
    </script>

    <script>
        $(document).ready(function () {
            $('a.vac-call, a.file-call, a.resume-call, a.response-call').click(function () {
                var that = this;
                var link = $(this).attr('href');
                if($(that).hasClass('active')){
                    $(that).removeClass('active');
                    $('.downlist').hide('slow');
                }else{
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}});
                    $.ajax({
                        url: link,
                        success: function(data){
                            $('.active').removeClass('active');

                            $('.downlist').show('slow').html(data);
                            $(that).addClass('active');
                        }
                    })
                }
                return false;
            })
//            $("a.resume-call").click(function(){
//                $(".send-resume-company").toggle();
//            });
        })

    </script>

    <script>
        function ConfirmDelete() {
            var conf = confirm("Ви дійсно хочете видалити компанію?");
            if(conf) return true;
            else return false;
        }
    </script>



@stop
