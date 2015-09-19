@extends('app')

@section('content')
    <ul class="nav navbar-nav navbar-right">
        <li> <a href="{{$vacancy->id}}/destroy" onclick="return ConfirmDelete();">Видалити</a></li>
        <li> <a href="{{$vacancy->id}}/edit">Редагувати</a></li>
    </ul>

    <div class="panel panel-orange">
        <div class="panel-heading"><h1>Перегляд вакансії</h1></div>
        <ul class="list-group">
            <li class="list-group-item"> Дата розміщення :{{ date('j.m.Y,H:i:s', strtotime($vacancy->created_at)) }}</li>
            <li class="list-group-item">Компанія : {{$company->company_name}}</li>
            <li class="list-group-item">Зарплата : {{$vacancy->salary}}}</li>
            <li class="list-group-item">Позиція : {{$vacancy->position}}</li>
            <li class="list-group-item">Місто :  @foreach($cities as $city) {{$city->name}}, @endforeach</li>
            <li class="list-group-item">Галузь :  {{$industry->name}}</li>
            <li class="list-group-item">Опис :  {{$vacancy->description}}</li>
            <li class="list-group-item">Від кого :  {{$user->name}}</li>
        </ul>
    </div>

    <script>

        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити вакансію?");

            if(conf) return true;

            else return false;
        }
    </script>

@stop