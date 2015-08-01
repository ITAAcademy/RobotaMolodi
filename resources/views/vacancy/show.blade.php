@extends('app')

@section('content')
    <ul class="nav navbar-nav navbar-right">
        <li> <a href="{{$vacancy->id}}/destroy">Видалити</a></li>
        <li> <a href="{{$vacancy->id}}/edit">Редагувати</a></li>
    </ul>
    <h1>Перегляд вакансії</h1>
    Дата розміщення : {{$vacancy->created_at}}<br>
    Компанія :        {{$company_name->company_name}}<br>
    Зарплата :        {{$vacancy->salary}}<br>
    Позиція :         {{$vacancy->position}}<br>
    Місто :           {{$vacancy->city}}<br>
    Галузь :          {{$vacancy->branch}}<br>
    Опис :            {{$vacancy->description}}<br>
    <a href="{{$vacancy->id}}/response">Відгукнутися</a>


    <script>
       function OpenResponseForm()
       {
       var responseWindow = window.open( 'ResponseWindow', 'height='+Math.min(500, screen.availHeight)+',width='+Math.min(500, screen.availWidth));

           var f
           var div = responseWindow.document.createElement('div');
           div.innerHTML = 'Добро пожаловать!';
           div.style.fontSize = '30px';
           div.style.margin = '100px';
           div.css('display','block');
           responseWindow.appendChild(div.innerHTML);



       }

    </script>

@stop