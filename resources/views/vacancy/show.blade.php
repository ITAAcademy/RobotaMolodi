@extends('app')

@section('content')

    <div class="panel panel-orange">
        <div class="panel-heading"><h2> {{$vacancy->position}} &#183; {{$vacancy->salary}} грн <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($vacancy->created_at))}}</h5></span></h2></div>
        <ul class="list-group">
            <li class="list-group-item">  <a target="_blank" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a>,{{$user->name}}  </li>
            <li class="list-group-item">  @foreach($cities as $city) {{$city->name}}<br> @endforeach</li>
            <li class="list-group-item">  {{$industry->name}}</li>
			<li class="list-group-item">  {{$vacancy->telephone}}</li>
			<li class="list-group-item"><span class="heading"> Опис : </span> {{$vacancy->description}} <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($vacancy->created_at))}}</h5></span></li>
            <li class="list-group-item">
                    <button class="btn btn-default" for="paste-link-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check())loadForm('pasteLink')@else
                    window.location='{{ url('auth/login') }}'@endif">Відправити URL</button>
                    <button class="btn btn-default" for="paste-file-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check())loadForm('pasteFile')@else
                    window.location='{{ url('auth/login') }}'@endif">Відправити файл</button>
                    <button class="btn btn-default" for="paste-resume-form" style="background: #f48952; margin-left: 50px" onclick="@if(Auth::check())loadForm('pasteResume')@else
                    window.location='{{ url('auth/login') }}'@endif">Відправити резюме</button>
            </li>

        </ul>
    </div>

    <div id="formContainer">

    </div>

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

    function loadForm(f) {
        var id = {{$vacancy->id}};
        $.ajax({
            url:"{{url("/vacancy")}}/" + id + '/' + f,
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
