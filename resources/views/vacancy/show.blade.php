@extends('app')

@section('content')


    <div class="panel panel-orange">
        <div class="panel-heading"><h2> {{$vacancy->position}} &#183; {{$vacancy->salary}} грн <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($vacancy->created_at))}}</h5></span></h2></div>
        <ul class="list-group">
            <li class="list-group-item">  <a target="_blank" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a>,{{$user->name}}  </li>
            <li class="list-group-item">  @foreach($cities as $city) {{$city->name}}<br> @endforeach</li>
            <li class="list-group-item">  {{$industry->name}}</li>
            <li class="list-group-item">
                    <button class="btn btn-default" for="paste-link-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check()){buttonHandler(event)}@else
                            location='{{url('/auth/login')}}'@endif">Відправити URL</button>
                    <button class="btn btn-default" for="paste-file-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check()){buttonHandler(event)}@else
                            location='{{url('/auth/login')}}'@endif">Відправити файл</button>
                    <button class="btn btn-default" for="paste-resume-form" style="background: #f48952; margin-left: 50px" onclick=" @if(Auth::check()){buttonHandler(event)}@else
                            location='{{url('/auth/login')}}'@endif">Відправити резюме</button>
            </li>

        </ul>
    </div>

    <div class="col-sm-offset-2 col-sm-10 form" style="display: none " id="paste-link-form">


        {!!Form::open(['route' => 'vacancy.link'])!!}

        <h3 style="margin-top: 30px">Вставити посилання на резюме</h3>
        <div class="form-group {{$errors-> has('Link') ? 'has-error' : ''}}" style="margin-top: 30px">
            <label for="sector" class="col-sm-2 control-label">Посилання</label>
            <div class="col-sm-5">
                {!! Form::text('Link', null, array('class' => 'form-control','autocomplete'=>"off",'required','id'=>'Link','onchange'=>'PasteLink()')) !!}
            </div>
            <div class=" col-sm-5" name="linkError">{!! $errors->first('Link', '<span class="help-block">:message</span>') !!}</div>
            </br>
        </div>


        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
            <input type="submit" class="btn btn-default" name="btn" onclick="PasteLink()" style="background: #f48952" value="Відправити посилання">
        </div>
    </div>
    {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
    {!! Form::hidden('email', $user->email, array('class' => 'form-control')) !!}
    {!! Form::hidden('emailAddressee', $user->email, array('class' => 'form-control')) !!}
    {!!Form::token()!!}
    {!!Form::close()!!}



    <div class="col-sm-offset-2 col-sm-10 form" style="margin-top: 20px;display: none " id="paste-file-form">

        {!!Form::open(['route' => 'vacancy.sendFile','enctype' => 'multipart/form-data', 'files' => true])!!}

        <h3 style="margin-top: 10px">Завантажити файл</h3>
        <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" style="margin-top: 30px">
        <div class="form-group" style="margin-top: 30px">
            <label for="sector" class="col-sm-2 control-label">Завантажити файл</label>
            <div class="col-sm-5">
                {!! Form::file('Load',array('class' => 'form-control','id'=>'File')) !!}
            </div>
            <div class=" col-sm-5">{!! $errors->first('Load', '<span class="help-block">:message</span>') !!}</div>
            </br>
        </div>

        {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
        {!! Form::hidden('email', $user->email, array('class' => 'form-control')) !!}
        {!! Form::hidden('emailAddressee', $user->email, array('class' => 'form-control')) !!}
        <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px">
            <input type="submit" class="btn btn-default" onclick="PasteFile()" style="background: #f48952" value="Відправити файл">
        </div>
    </div>
        </div>
    {!!Form::token()!!}
    {!!Form::close()!!}


    <div class="col-sm-offset-2 col-sm-10 form" style="display: none "  id="paste-resume-form">

        {!!Form::open(['route' => 'vacancy.response'])!!}
        <div class="form-group">
            <div class="col-sm-6">
            @if($resume == '' || empty($resume->all()))
                <p>У вас немає резюме.Перейти до створення резюме</p>
                <p>{!!link_to_route('resume.create','Створення резюме')!!}</p>
            </div>
        </div>

        @else
        <h3 style="margin-top: 10px">Завантажити резюме</h3>
        <div class="form-group {{$errors-> has('Load') ? 'has-error' : ''}}" >
            <div class="form-group" >
                <label for="sector" class="col-sm-3 control-label">Виберіть резюме</label>
                <div class="col-sm-5">
                    <select class="form-control" id="resume">
                        @foreach($resume as $res)
                                <option value="{{$res->id}}" selected>{{$res->position}}</option>
                        @endforeach
                    </select>

                </div>
                </br>
            </div>

            {!! Form::hidden('id', $vacancy->id, array('class' => 'form-control')) !!}
            {!! Form::hidden('email', $user->email, array('class' => 'form-control')) !!}
            {!! Form::hidden('emailAddressee', $user->email, array('class' => 'form-control')) !!}
            <div class="col-sm-offset-3 col-sm-10" style="margin-top: 20px">
                <input type="submit" class="btn btn-default" style="background: #f48952" value="Відправити резюме">
            </div>

        </div>
        @endif
    </div>

    {!!Form::token()!!}
    {!!Form::close()!!}

<script>

//    function PasteResume() {
//    var listDiv = document.getElementById('listDiv');
//    var display = listDiv.style.display;
//    if (display == "block") {
//    listDiv.style.display = "none";
//
//    }
//    else {
//    document.getElementById('listDiv').style.display = "none";
//    listDiv.style.display = "block";
//    }
//    }

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

    function PasteFile() {

        var inputFile = document.getElementById("File");
// проверяет, поддерживает ли веб-браузер (Opera и IE не поддерживают) объект "FileReader",
// и если - да, то выбран ли файл
        if (typeof(FileReader) != "undefined" && inputFile.value != "") {
            // получаем доступ к выбранному файлу
            var fileObj = inputFile.files[0];
            // определяем имя файла с свойства "name" или "fileName"
            var fileName = fileObj.name || fileObj.fileName;
            // определяем mime-тип файла с свойства "type" или "mediaType"
            var fileType = fileObj.type || fileObj.mediaType;
            // определяем размер файла с свойства "size" или "fileSize"
            var fileSize = fileObj.size || fileObj.fileSize;
            // выводим результат
//            alert(
//                    "Name: " + fileName + "\n" +
//                    "Type: " + fileType + "\n" +
//                    "Size: " + fileSize
//            );
            var control = ['doc', 'docx', 'odt', 'rtf', 'txt', 'pdf'];

            var parts = fileName.split('.');

            var last = parts [parts.length - 1];
            for (var i = 0; i < control.length; i++) {

                if (last == control[i]) {
                }
                else {
                    $("label[for='sector']").addClass('error');
                    $("span[class='help-block']").html('Будь ласка, завантажте файл в форматі doc, docx, odt, rtf, txt або pdf.');
                    return false;
                }
            }
        }
        else {

        }
    }

</script>
@stop