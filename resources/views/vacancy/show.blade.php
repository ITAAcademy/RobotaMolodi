@extends('app')

@section('content')

    <div class="panel panel-orange">
        <div class="panel-heading"><h2> {{$vacancy->position}} &#183; {{$vacancy->salary}} грн <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($vacancy->created_at))}}</h5></span></h2></div>
        <ul class="list-group">
            <li class="list-group-item">  <a target="_blank" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a>,{{$user->name}}  </li>
            {!!Form::open(['route' => 'sortVacancies', 'method' => 'get', 'name' => 'filthForm'])!!}
                <li class="list-group-item">  <a href="javascript:submitCity()" id = "valCity">@foreach($cities as $city){{$city->name}}</a><br> @endforeach</li>
                <input type = "hidden" name = "city" id = "idCity"/>
                <li class="list-group-item">  <a href="javascript:submitInd()"  id = "valInd">{{$industry->name}}</a> </li>
                <input type = "hidden" name = "industry" id = "idInd"/>
            {!!Form::close()!!}
			<li class="list-group-item">  {{$vacancy->telephone}}</li>
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

    function submitCity()
    {
        var x = document.getElementById("valCity").innerHTML;
        var y;
        switch(x)
        {
            case 'Уся Україна':
                y = '1';
                break;
            case 'Вінниця':
                y = '2';
                break;
            case 'Дніпропетровськ':
                y = '3';
                break;
            case 'Донецьк':
                y = '4';
                break;
            case 'Житомир':
                y = '5';
                break;
            case 'Запоріжжя':
                y = '6';
                break;
            case 'Івано-Франківськ':
                y = '7';
                break;
            case 'Київ':
                y = '8';
                break;
            case 'Кіровоград':
                y = '9';
                break;
            case 'Луганськ':
                y = '10';
                break;
            case 'Луцьк':
                y = '11';
                break;
            case 'Львів':
                y = '12';
                break;
            case 'Миколаїв':
                y = '13';
                break;
            case 'Одеса':
                y = '14';
                break;
            case 'Полтава':
                y = '15';
                break;
            case 'Рівне':
                y = '16';
                break;
            case 'Севастополь':
                y = '17';
                break;
            case 'Сімферополь':
                y = '18';
                break;
            case 'Суми':
                y = '19';
                break;
            case 'Тернопіль':
                y = '20';
                break;
            case 'Ужгород':
                y = '21';
                break;
            case 'Харків':
                y = '22';
                break;
            case 'Херсон':
                y = '23';
                break;
            case 'Хмельницький':
                y = '24';
                break;
            case 'Черкаси':
                y = '25';
                break;
            default:
                y = '666';
        }
        document.getElementById("idCity").value = y;
        document.getElementById("idInd").value = null; //set null to industry
        document.filthForm.submit();
    }
    function submitInd()
    {
        var x = document.getElementById("valInd").innerHTML;
        var y;
        switch(x)
        {
            case 'Торгівля/продаж':
                y = '1';
                break;
            case 'Інформаційні технології':
                y = '2';
                break;
            case 'Керівництво/топ-менеджмент':
                y = '3';
                break;
            case 'Менеджери/керівники середньої ланки':
                y = '4';
                break;
            case 'Бухгалтерія/банк/фінанси/аудит':
                y = '5';
                break;
            case 'Офісний персонал/HR':
                y = '6';
                break;
            case 'Реклама/маркетинг/pr':
                y = '7';
                break;
            case 'Інженерія/технології':
                y = '8';
                break;
            case 'Будівництво/архітектура/нерухомість':
                y = '9';
                break;
            case 'Юриспруденція/страхування/консалтинг':
                y = '10';
                break;
            case 'Логістика/склад/митниця':
                y = '11';
                break;
            case 'Транспорт/служба безпеки/охорона':
                y = '12';
                break;
            case 'Поліграфія/дизайн/оформлення':
                y = '13';
                break;
            case 'Виробництво/робітничі спеціальності':
                y = '14';
                break;
            case 'Краса/фітнес/спорт/туризм':
                y = '15';
                break;
            case 'Мистецтво/розваги/шоу-бізнес':
                y = '16';
                break;
            case 'Журналістика/редагування/переклади':
                y = '17';
                break;
            case 'Освіта/наука/виховання':
                y = '18';
                break;
            case 'Сфера обслуговування/кулінарія/готелі/ресторани':
                y = '19';
                break;
            case 'Охорона здоров\'я/фармацевтика':
                y = '20';
                break;
            case 'Сільське господарство/переробка с/г продукції':
                y = '21';
                break;
            case 'Домашній персонал/різноробочі':
                y = '22';
                break;
            case 'Громадські організації/політичні партії':
                y = '23';
                break;
            case 'Екологія/охорона навколишнього середовища':
                y = '24';
                break;
            case 'Соціальна сфера':
                y = '25';
                break;
            default:
                y = '666';
        }
        document.getElementById("idInd").value = y;
        document.getElementById("idCity").value = null; //set null to city
        document.filthForm.submit();
    }

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
