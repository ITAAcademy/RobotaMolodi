@extends('app')

@section('content')

    <div class="panel panel-orange">
        <div class="panel-heading"> <h2>{!!$resume->position!!}  &#183;  {!!$resume->salary!!} грн. <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($resume->created_at))}}</h5></span></h2></div>
        <ul class="list-group">
            <li class="list-group-item"> {!!$resume->name_u!!}</li>
            {!!Form::open(['route' => 'sortResumes', 'method' => 'get', 'name' => 'filthForm'])!!}
                <li class="list-group-item"><a href="javascript:submitCity()" id = "valCity">{!!$city->name!!}</a></li>
                <input type = "hidden" name = "city" id = "idCity"/>
                <li class="list-group-item"><a href="javascript:submitInd()"  id = "valInd">{!!$resume->Industry()->name!!}</a></li>
                <input type = "hidden" name = "industry" id = "idInd"/>
            {!!Form::close()!!}
            <li class="list-group-item"><span class="heading"> Опис: </span> {!!$resume->description!!}</li>
            <li class="list-group-item"><a href="{{$resume->id}}/send_message">Написати на пошту</a></li>
        </ul>
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
    </script>
@stop

