@extends('app')

@section('content')
    <div id="t">
    <div class="panel panel-orange">
        <div class="panel-heading"><h2> {{$vacancy->position}} &#183; {{$vacancy->salary}} грн <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y, H:i:s', strtotime($vacancy->created_at))}}</h5></span></h2></div>
    </div>
    <div class="panel panel-orange" style="background-color: #ffffff">
        <ul class="list-group" style="float: right">
            <li class="list-group-item">  <a target="_blank" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a>, {{$user->name}}  </li>
            {!!Form::open(['route' => 'sortVacancies', 'method' => 'get', 'name' => 'filthForm', 'id' => 'aform'])!!}
                <li class="list-group-item">  <a href="javascript:submitCity()" id = "valCity">@foreach($cities as $city){{$city->name}}</a><br> @endforeach</li>
                <input type = "hidden" name = "city" id = "idCity"/>
                <li class="list-group-item">  <a href="javascript:submitInd()"  id = "valInd">{{$industry->name}}</a> </li>
                <input type = "hidden" name = "industry" id = "idInd"/>
            {!!Form::close()!!}
			<li class="list-group-item">  {{$vacancy->telephone}}</li>
            <li class="list-group-item" id="opt-data-low">
                    <button class="btn btn-default" for="paste-link-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check())loadForm('pasteLink')@else
                    window.location='{{ url('auth/login') }}'@endif">Відправити URL</button>
                    <button class="btn btn-default" for="paste-file-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check())loadForm('pasteFile')@else
                    window.location='{{ url('auth/login') }}'@endif">Відправити файл</button>
                    <button class="btn btn-default" for="paste-resume-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check())loadForm('pasteResume')@else
                    window.location='{{ url('auth/login') }}'@endif">Відправити резюме</button>
            </li>

        </ul>
        <div class="panel panel-orange" id="vimg">
            @if(File::exists('image/vacancy/' . $vacancy->company_id . '.png'))
                {!! Html::image('image/vacancy/' . $vacancy->id . '.png', 'logo', ['id' => 'vacImg', 'width' => '100%', 'height' => '100%']) !!}
            @else
                {!! Html::image('image/default300.png', 'logo', array('id' => 'vacImg', 'width' => '100%', 'height' => '100%')) !!}
            @endif
        </div>
    </div>

    <div id="formContainer">

    </div>
    </div>

<script>
    /*function sCity()
    {
        var x = document.getElementById("valCity").innerHTML;
        document.getElementById("idCity").value = x;
        document.getElementById("idInd").value = null; //set null to industry

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if(xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("t").innerHTML = null;//xhttp.responseText;
        };
        xhttp.open("GET", "vacancy.sortVacancies?city=" + x + "&industry=", true);
        xhttp.send();
    }
    function sInd()
    {
        var x = document.getElementById("valInd").innerHTML;
        document.getElementById("idInd").value = x;
        document.getElementById("idCity").value = null; //set null to city

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if(xhttp.readyState == 4 && xhttp.status == 200)
                document.getElementById("t").innerHTML = xhttp.responseText;
        };
        xhttp.open("GET", "sortVacancies?city=&industry=" + x, true);
        xhttp.send();
    }*/

    function submitCity()
    {
        var x = document.getElementById("valCity").innerHTML;
        document.getElementById("idCity").value = x;
        document.getElementById("idInd").value = null; //set null to industry
        document.filthForm.submit();
    }
    function submitInd()
    {
        var x = document.getElementById("valInd").innerHTML;
        document.getElementById("idInd").value = x;
        document.getElementById("idCity").value = null; //set null to city
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
