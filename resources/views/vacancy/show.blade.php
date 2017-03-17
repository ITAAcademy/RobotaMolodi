@extends('app')
@section('head')
    <link href="{{ asset('/css/vacancyShow.css') }}" rel="stylesheet">
@endsection

@section('content')
    {!!Form::open(['route' => 'head', 'method' => 'post', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "filterName" id = "filterName"/>
    <input type = "hidden" name = "filterValue" id = "filterValue"/>
    {!!Form::close()!!}

    <div class="panel panel-orange" id="vrBlock">
        <div class="row">
            <div class="col-md-2">
                <div class="logos">
                    <div class="panel panel-orange" id="vimg">
                        @if(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.png')))
                            {!! Html::image('image/vacancy/' . $vacancy->company_id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpg')))
                            {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpeg')))
                            {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.bmp')))
                            {!! Html::image('vacancies' . $vacancy->company_id . '.bmp', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
                        @else
                            <h3 class="nologo">логотип вiдсутнiй</h3>
                        @endif
                    </div>
                    <div class="col-xs-12 case">
                        <div class="col-xs-2 case-img">
                            <i class="fa vacancy">&#xf0b1;</i>
                        </div>
                        <div class="col-xs-10 consult">
                            <a href="#">запланувати консультацію</a>
                        </div>
                    </div>
                    <div class="share">
                        <p id="share-vacancy">Поділитись</p>
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
                    <div class="panel-headings">
                        <a class="greyLinks" href="javascript:submit('selectSpecialisation', '{{$vacancy->position}}')">{{$vacancy->position}}</a>
                    </div>
                    <div>
                        <div class="text_vac otstup1"><span>Компанія: </span><a class="orangeLinks" href="javascript:submit('companies' {{$company->id}})">{{$company->company_name}}</a> </div>
                    </div>
                    <div>
                        <div class="text_vac otstup1"><span>Галузь: </span><a class="orangeLinks" href="javascript:submit('selectIndustry'{{$industry->id}})">{{$industry->name}}</a> </div>
                    </div>
                    <div>
                        <div class="text_vac otstup1"><span>Заробітна платня: </span><span class="seleryvacancy">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span> </div>
                    </div>
                    <div>
                        <div class="text_vac otstup1"><span class="anagraph">Подробиці </span><br>{{$vacancy->description}}</div>
                    </div>
                    <div>
                        <div class="text_data otstup1">@foreach($cities as $city)<a class="orangeLinks" href="javascript:submit('selectCity'{{$city->id}})">{{$city->name}} </a>@endforeach<span id="yellowCircleVacancy">&#183;</span> {{date('j m Y', strtotime($vacancy->updated_at))}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-colomn-vacancy">
            <div class="right-vac">
                <div class="list-but-vac">
                    <ul class="list-inline">
                        <li class="li-link send-url-link" data-type="url">
                            <i class="fa fa-link"></i>
                            <button type="button" class="btn btn-link" onclick="showDiv('send-URL-vacancy')">відправити URL</button>
                        </li>
                        <li class="li-link send-file-link" data-type="file">
                            <i class="fa fa-file-o"></i>
                            <button type="button" class="btn btn-link" onclick="showDiv('send-file-vacancy')">відправити файл</button>
                        </li>
                        <li class="li-link send-resume-link" data-type="resume">
                            <i class="fa fa-file-text-o"></i>
                            <button type="button" class="btn btn-link" onclick="showDiv('send-resume-vacancy')">відправити резюме</button>
                        </li>
                    </ul>
                </div>

                <div id="send-URL-vacancy">
                    {!!Form::open(['route' => ['vacancy.response.link',$vacancy->id]]) !!}
                    {!!Form::label('url', 'Вставити посилання на URL:',['class' => 'url-text-vac'] )!!}
                    {!!Form::text('link',null,array('class' => 'form-control url-input-vac','placeholder' =>'URL:','autocomplete'=>"off",'required','id'=>'Link'))!!}
                    <div align="right">
                        {!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}
                    </div>
                    {!!Form::close()!!}
                </div>

                {{--<div id="send-file-vacancy">--}}
                    {{--{!!Form::open(array(['route' => 'vacancy.show','method'=>"post", 'enctype' => 'multipart/form-data', 'files' => true]))!!}--}}
                    {{--{!! Form::file('file',array('class' => 'open-file-vac', 'id'=>'File', 'name' => 'FileName')) !!}--}}
                    {{--<div align="right">--}}
                        {{--{!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}--}}
                    {{--</div>--}}
                    {{--{!!Form::close()!!}--}}
                {{--</div>--}}

                {{--<div id="send-resume-vacancy">--}}
                    {{--{!!Form::open(['route' => 'vacancy.show'])!!}--}}
                    {{--<div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >--}}
                        {{--@if (!empty($resume->all()))--}}
                        {{--<select class="form-control" id="resume" name="resumeId" style="margin-top: 10px">--}}
                        {{--@foreach($resume as $res)--}}
                        {{--<option value="{{$res->id}}" selected>{{$res->position}}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        {{--{!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}--}}

                        {{--@else--}}
                        {{--<p>У вас немає резюме.Перейти до створення резюме</p>--}}
                        {{--<p>{!!link_to_route('resume.create','Створення резюме')!!}</p>--}}
                        {{--@endif--}}
                        {{--<div align="right">--}}
                            {{--{!!Form::submit('Відправити', ['class' => 'btn btn-warning btn-send'])!!}--}}
                        {{--</div>--}}
                        {{--{!!Form::close()!!}--}}
                    {{--</div>--}}


                    {{--<!-- Form URL -->--}}
                    {{--<div id="send-URL-vacancy" class="send_block">--}}
                    {{--<form class="URL_vacancy">--}}
                    {{--<span class="bold_vacancy">Вставити посилання на резюме:</span>--}}
                    {{--<input class="form-control" type="text" placeholder="URL">--}}
                    {{--</form>--}}

                    {{--<form class="send">--}}
                    {{--<button type="button" class="sent_file_button">Відправити</button>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--<!-- End of Form URL -->--}}

                    {{--<!-- Form File -->--}}
                    {{--<div id="send-file-vacancy" class="send_block">--}}
                    {{--<form class="send_form" method="post">--}}
                    {{--<span class="bold_vacancy" style="font-size: 18px; color: #797979">Завантажити файл:</span>--}}
                    {{--<div style=" margin-top:5px; height: 44px;">--}}
                    {{--<div class="file_upload">--}}
                    {{--<button type="button" class="sent_file_button" id="choose_file">Вибрати файл</button>--}}
                    {{--<input type="file" class="insert_file" id="uploaded-file" onchange="getFileName ();">--}}
                    {{--</div>--}}
                    {{--<p class="text_vac dont_choose" id="file-name">Файл не выбран</p>--}}
                    {{--</div>--}}

                    {{--<button type="button" class="sent_file_button">Відправити</button>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--<!-- End of Form File -->--}}

                    {{--<!-- Form Resume -->--}}
                    {{--<div id="send-resume-vacancy" class="send_block">--}}
                    {{--<form class="URL_vacancy">--}}
                    {{--<span class="bold_vacancy">Вставити посилання на резюме:</span>--}}
                    {{--<select class="form-control">--}}
                    {{--<option>resume 1</option>--}}
                    {{--<option>resume 2</option>--}}
                    {{--<option>resume 3</option>--}}
                    {{--</select>--}}
                    {{--</form>--}}

                    {{--<form class="send">--}}
                    {{--<button type="button" class="sent_file_button">Відправити</button>--}}
                    {{--</form>--}}
                    {{--</div>--}}
                    {{--<!-- end of Form Resume -->--}}

                </div>
            </div>
            {{--<script src="/public/js/script_one_vacancy.js"></script>--}}
            <script>
                function showDiv(id){
                    var closeAll = false;
                    if(document.getElementById(id).style.display == "block")
                        closeAll = true;
                    document.getElementById('send-URL-vacancy').style.display = "none";
                    document.getElementById('send-file-vacancy').style.display = "none";
                    document.getElementById('send-resume-vacancy').style.display = "none";
                    if(!closeAll)
                        document.getElementById(id).style.display = "block";
                }

                function getFileName () {
                    var file = document.getElementById ('uploaded-file').value;
                    file = file.replace(/\\/g, "/").split('/').pop();
                    document.getElementById ('file-name').innerHTML = file;
                }
            </script>

            {{--@include('/vacancy/pasteVacancyForm/link')--}}
            {{--@include('/vacancy/pasteVacancyForm/file')--}}
            {{--@include('/vacancy/pasteVacancyForm/resume')--}}
            <script>

            </script>
        </div>

@stop