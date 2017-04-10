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
                        @if(File::exists(public_path('image/vacancy/' . $company->id . '.png')))
                            {!! Html::image('image/vacancy/' . $company->id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $company->id . '.jpg')))
                            {!! Html::image('image/vacancy/' . $company->id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $company->id . '.jpeg')))
                            {!! Html::image('image/vacancy/' . $company->id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $company->id . '.bmp')))
                            {!! Html::image('vacancies' . $company->id . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
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
                        <a href="https://www.linkedin.com/" target="_blank"><i class="fa">&#xf08c;</i></a>
                        <a href="https://www.facebook.com" target="_blank"><i class="fa">&#xf082;</i></a>
                        <a href="https://www.twitter.com" target="_blank"><i class="fa">&#xf081;</i></a>
                        <a href="https://vk.com" target="_blank"><i class="fa" >&#xf189;</i></a>
                        <a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus-square"></i></a>
                    </div>
                 </div>
            </div>
            <div class="col-md-10">

                <div id="datAnnoyingSizes">
                    <div class="panelHeadings">
                        <div class="textCompany verticalIndent"><a class="greyLinks" href="javascript:submit('companies' {{$company->id}})">{{$company->company_name}}</a> </div>
                    </div>
                    <div>
                        <div class="textCompany verticalIndent"><span>Галузь: </span><a class="orangeLinks" href="javascript:submit('selectIndustry')">{{$industryName}}</a> </div>
                    </div>
                    <div>
                        <div class="textCompany verticalIndent">
                            <span class="anagraph verticalIndent">Подробиці </span>
                            <br><div class="description">{!! $company->description !!}</div>
                        </div>
                    </div>
                    <div>
                        <div class="text_data verticalIndent"> <a class="textCompany"> </a></div>
                    </div>
                </div>
                <div>

                </div>
                {{--{{ dd('test')}}--}}
                <div class="button_vac">
                    <a href="{{route('scompany.company_vacancies',$company->id)}}" class="vac-call btn-default btn"><span>Переглянути вакансії</span></a>
                    <a href="#" class="file-call btn-default btn">Відправити файл</a>
                    <a href="#" class="resume-call btn-default btn">Відправити резюме</a>
                    <a href="#" class="response-call btn-default btn">Відгукнутись</a>
                </div>
            </div>
        </div>

        <div class="downlist">
        </div>
        <div class="send-file-company" style='display: none;'>
            {!!Form::open(['route' => ['company.response.sendFile',$company->id],'method'=>"POST", 'enctype' => 'multipart/form-data', 'files' => true])!!}
            {!! Form::file('file',array('class' => 'open-file-vac', 'id'=>'File', 'name' => 'FileName')) !!}
            <div align="right">
                {!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}
            </div>

            {!!Form::close()!!}
        </div>
        <div class="send-resume-company" style='display: none;'>
            <div>
                <h3 style="margin-top: 5px">Виберіть резюме</h3>
            </div>
            {{--<div>--}}
                {{--{!!Form::open(['route' => ['vacancy.response.sendResume',$vacancy->id],'method'=>"POST"])!!}--}}
                {{--<div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >--}}
                    {{--@if(!empty($resume))--}}
                        {{--<select class="form-control" id="resume" name="resumeId" style="margin-top: 10px">--}}
                            {{--@foreach($resume as $res)--}}
                                {{--<option value="{{$res->id}}" selected>{{$res->position}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                {{--</div>--}}
                {{--{!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}--}}
                {{--@else--}}
                    {{--<p>У вас немає резюме.Перейти до створення резюме</p>--}}
                    {{--<p>{!!link_to_route('resume.create','Створення резюме','','style="color:#f68c06"')!!}</p>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--@if (!empty($resume))--}}
                    {{--<div align="right">--}}
                        {{--{!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--</div>--}}

            {!!Form::close()!!}
        </div>


    <script>
        $(document).ready(function () {
           $('a.vac-call').click(function () {
               var link = $(this).attr('href');

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                   }
               });
               $.ajax({
                   url: link,
                   success: function(data){
                       $('.downlist').toggle().html(data);

                   }
               })
               return false;
           })
            $("a.file-call").click(function(){
                $(".send-file-company").toggle();
            });
            $("a.resume-call").click(function(){
                $(".send-resume-company").toggle();
            });
        })
//        }
    </script>
@stop
