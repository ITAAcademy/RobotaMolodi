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

                <div class="row textCompany">

                    <div class="col-xs-12 text_com">
                        <div class="ratings">
                            <span class = "ratingsTitle">Рейтинг:</span>
                            <span class="morph">
                                {!! Html::image(asset('image/like.png'), 'like', ['class'=>'likeDislike']) !!}
                                <span class="findLike" id="{{route('com.rate', $company->id)}}_1">{{$company->rated()->getLikes($company)}}</span>
                            </span>
                            <span class="morph">
                                {!! Html::image(asset('image/dislike.png'), 'dislike', ['class'=>'likeDislike']) !!}
                                <span class="findDislike" id="{{route('com.rate', $company->id)}}_-1">{{$company->rated()->getDisLikes($company)}}</span>
                            </span>
                            <span class="likeError"></span>
                        </div>
                    </div>

                    <div class="col-xs-3 text_com">
                        <span>Аббревиатура: </span>
                    </div>
                    @if(!empty($company->short_name))
                        <div class="col-xs-9 text_com">
                            <span>{{$company->short_name}}</span>
                        </div>
                    @else
                        <div class="col-xs-9 text_com">
                            <span>Не вказано</span>
                        </div>
                    @endif

                    <div class="col-xs-3 text_com">
                        <span>Галузь: </span>
                    </div>
                    @if(!empty($industry->name))
                        <div class="col-xs-9 text_com">
                            <span>{{$industry->name}}</span>
                        </div>
                    @else
                        <div class="col-xs-9 text_com">
                            <span>Не вказано</span>
                        </div>
                    @endif

                    <div class="col-xs-3 text_com">
                        <span>Посилання: </span>
                    </div>
                    @if(!empty($company->link))
                        <div class="col-xs-9 text_com">
                            <a class="orangeLinks" href="{{$company->link}}">{{$company->link}}</a>
                        </div>
                    @else
                        <div class="col-xs-9 text_com">
                            <span>Не вказано</span>
                        </div>
                    @endif

                    <div class="col-xs-3 text_com">
                        <span>Мiсто: </span>
                    </div>
                    @if(!empty($city->name))
                        <div class="col-xs-9 text_com">
                            <span>{{$city->name}}</span>
                        </div>
                    @else
                        <div class="col-xs-9 text_com">
                            <span>Не вказано</span>
                        </div>
                    @endif

                    <div class="col-xs-3 text_com">
                        <span>Електронна пошта: </span>
                    </div>
                    @if(!empty($company->company_email))
                        <div class="col-xs-9 text_com">
                            <span>{{$company->company_email}}</span>
                        </div>
                    @else
                        <div class="col-xs-9 text_com">
                            <span>Не вказано</span>
                        </div>
                    @endif

                    <div class="col-xs-3 text_com">
                        <span>Телефон: </span>
                    </div>
                    @if(!empty($company->phone))
                        <div class="col-xs-9 text_com">
                            <span>{{$company->phone}}</span>
                        </div>
                    @else
                        <div class="col-xs-9 text_com">
                            <span>Не вказано</span>
                        </div>
                    @endif

                    <div class="col-xs-12 textCompany verticalIndent">
                        <span class="anagraph verticalIndent">Подробиці </span>
                    </div>
                    @if(!empty($company->description))
                        <div class="col-xs-12 description">
                           <span>{!! strip_tags($company->description, '<em><a><s><p><span><b><ul><ol><li><strong><h1><h2><h3><h4><h5><blockquote><body><table><tr><td>') !!}</span>
                        </div>
                    @else
                        <div class="col-xs-12 text_com">
                            <span>Детальна інформація про компанію відсутня.</span>
                        </div>
                    @endif
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
                            <p>На даний момент немає активних вакансій</p>
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
