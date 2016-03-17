@extends('app')

@section('content')
    {!!Form::open(['route' => 'sortVacancies', 'method' => 'get', 'name' => 'filthForm', 'id' => 'aform'])!!}
    <input type = "hidden" name = "specialisation_" id = "idSpec"/>
    <input type = "hidden" name = "city_id" id = "idCity"/>
    <input type = "hidden" name = "industry_id" id = "idInd"/>
    {!!Form::close()!!}
    <div class="panel panel-orange" id="vrBlock">
        <div class="panel-heading" id="datAnnoyingSizes">
            <h2>
                <a class="orangeLinks" href="javascript:submit('0', '0' , '{{$vacancy->position}}')">{{$vacancy->position}}</a>
                <br><span style="color: red">{{$vacancy->salary}} - {{$vacancy->salary_max}} {{$vacancy->Currency()[0]['currency']}}</span>
            </h2>
        </div>
        <ul class="list-group" id="datAnnoyingSizes">
            <li class="list-group-item">  {{$user->name}}</li>
            <li class="list-group-item">  <a class="orangeLinks" href="javascript:submit('0', {{$industry->id}} ,'empty')">{{$industry->name}}</a> </li>
            <li class="list-group-item" style="border-bottom: none"><span class="heading">Опис: </span>{{$vacancy->description}}</li>
            <li class="list-group-item">  <a style="text-decoration: underline" class="orangeLinks" target="_blank" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a></li>
            <li class="list-group-item" style="color: #777777;">@foreach($cities as $city)<a class="orangeLinks" href="javascript:submit({{$city->id}}, '0' ,'empty')">{{$city->name}}</a>@endforeach <span id="yellowCircle">&#183;</span> {{ date('j.m.Y, H:i:s', strtotime($vacancy->created_at))}}</li>
            <li class="list-group-item" id="opt-data-low">
                <button class="btn btn-default" data-toggle="modal" data-target="#sendLink" for="paste-link-form" style="background: #f48952; margin-left: 50px" onclick="@if(!Auth::check())
                        window.location='{{ url('auth/login') }}'@endif">Відправити URL</button>
                <button class="btn btn-default" data-toggle="modal" data-target="#sendFile" for="paste-file-form" style="background: #f48952; margin-left: 50px" onclick="@if(!Auth::check())
                        window.location='{{ url('auth/login') }}'@endif">Відправити файл</button>
                <button class="btn btn-default" data-toggle="modal" data-target="#sendRes" for="paste-resume-form" style="background: #f48952; margin-left: 50px" onclick="@if(!Auth::check())
                        window.location='{{ url('auth/login') }}'@endif">Відправити резюме</button>
            </li>
        </ul>
        @include('/vacancy/pasteVacancyForm/link')
        @include('/vacancy/pasteVacancyForm/file')
        @include('/vacancy/pasteVacancyForm/resume')
        <div class="panel panel-orange" id="vimg">
            @if(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.png')))
                {!! Html::image('image/vacancy/' . $vacancy->company_id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
            @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpg')))
                {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
            @elseif(File::exists(public_path('image/vacancy/' . $vacancy->company_id . '.jpeg')))
                {!! Html::image('image/vacancy/' . $vacancy->company_id . '.jpeg', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
            @else
                <h3 style="text-align: center; color: #f48952; margin-top: 80px">логотип вiдсутнiй</h3>
            @endif
        </div>
    </div>

    <div id="formContainer">

    </div>

    <script>
        function submit(c, i, s)
        {
            document.getElementById("idCity").value = c;
            document.getElementById("idInd").value = i;
            document.getElementById("idSpec").value = s;
            document.filthForm.submit();
        }

        function loadForm(f) {
            var id = {{$vacancy->id}};
            //console.log ("/vacancy/" + id + '/' + f);
            $.ajax({
                {{--{{dd('vacancy/' + (string) $vacancy->id)}};--}}
                url:"/vacancy/" + id + '/' + f,
                type: "GET",
                success: function (data) {
                    //$data = $(data);
                    $("#formContainer").html(data);
                }
            })
        }

        function buttonHandler(e)
        {
            var button = e.target;
            var formId = button.getAttribute("for");
            var forms = document.getElementsByClassName("col-sm-offset-2 col-sm-10 form");

            for(var i=0; i<forms.length; i++){
                if(forms[i].getAttribute("id") == formId){
                    forms[i].style.display = "block";
                }
                else { forms[i].style.display = "none";}

            }
        }

        function PasteLink(){

            var link = document.getElementById('Link').value;

            var reg = /^(https?:\/\/)?([\w\.]+)\.([a-z]{2,6}\.?)(\/[\w\.]*)*\/?$/;

            if(!reg.test(link)){
                $("input[name='Link']").removeClass('form-control');
                $("label[for='sector']").removeClass('form-control');
                $("input[name='Link']").addClass('errorField');
                $("label[for='sector']").addClass('error');
                $("div[name='linkError']").html("Будь ласка,введіть коректне посилання на резюме");
                $("div[name='linkError']").addClass("error");
                return false;
            }
            else{
                $("input[name='Link']").removeClass('errorField');
                $("input[name='Link']").addClass('form-control');
                $("div[name='linkError']").html("");
                $("label[for='sector']").removeClass('error');


                return true;
            }
        }
    </script>
@stop