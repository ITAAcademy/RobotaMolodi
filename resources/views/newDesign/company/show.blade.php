@extends('app')
@section('head')
{{--<link href="{{ asset('..resources/views/newDesign/css/oneCompany.css') }}" rel="stylesheet">--}}
<link href="{{ asset('/css/oneCompany.css') }}" rel="stylesheet">
@stop
@section('content')
        <div class="row">
            <div class="col-md-2">
                <div class="logos">
                    <div class="panel panel-orange" id="vimg">
                        @if(File::exists(public_path('image/company/' . $company->users_id .'/'. $company->image)))
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
            <div class="col-md-10">
                <div id="datAnnoyingSizes">

                    <div class="panelHeadings">
                        <div class="textCompany"><a class="greyLinks" href="javascript:submit('companies' {{$company->id}})">{{$company->company_name}}</a> </div>
                    </div>

                    <div class="row textCompany verticalIndent">
                        <div class="col-xs-3">
                            <span>Аббревиатура: </span>
                        </div>
                        <div class="col-xs-9">
                            <span>{{$company->short_name}}</span>
                        </div>

                        <div class="col-xs-3">
                            <span>Галузь: </span>
                        </div>
                        <div class="col-xs-9">
                            <span>{{$industries->name}}</span>
                        </div>

                        <div class="col-xs-3">
                            <span>Посилання: </span>
                        </div>
                        <div class="col-xs-9">
                            <a class="orangeLinks" href="{{$company->link_company}}">{{$company->link_company}}</a>
                        </div>

                        <div class="col-xs-3">
                            <span>Мiсто: </span>
                        </div>
                        <div class="col-xs-9">
                            <span>{{$cities->name}}</span>
                        </div>

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
                    </div>

                    <div>
                        <div class="textCompany verticalIndent">
                            <span class="anagraph verticalIndent">Подробиці </span>
                            <br><div class="description">{!! $company->description !!}</div>
                        </div>
                    </div>

                </div>

                <div class="button_vac">
                    <a href="{{route('scompany.company_vacancies',$company->id)}}" class="vac-call btn-default btn"><span>Переглянути вакансії</span></a>
                    <a href="{{route('scompany.company_formSendFile',$company->id)}}" class="file-call btn-default btn">Відправити файл</a>
                    <a href="{{route('scompany.company_formSendResume',$company->id)}}" class="resume-call btn-default btn">Відправити резюме</a>
                    <a href="{{route('company.response.index',$company->id)}}" class="response-call btn-default btn">Відгукнутись</a>
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
@stop
