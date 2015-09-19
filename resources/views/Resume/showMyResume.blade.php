@extends('app')

@section('content')
    <ul class="nav navbar-nav navbar-right">
        <!--<li> <a href="{{$resume->id}}/destroy" >Видалити</a></li>-->
        <li> <a id="myLink" href="{{$resume->id}}/destroy" onclick="return ConfirmDelete();">Видалити</a></li>

        <li> <a href="{{$resume->id}}/edit">Редагувати</a></li>
    </ul>

    <div class="panel panel-orange">
        <div class="panel-heading"><h3>{!!$resume->position!!} </h3></div>
        <ul class="list-group">
            <li class="list-group-item">  Ім'я :  {!!$resume->name_u!!}</li>
            <li class="list-group-item">  Позиція :  {!!$resume->position!!}</li>
            <li class="list-group-item">   Місто  :  {!!$resume->city!!}</li>
            <li class="list-group-item">  Промисловість: {!!$resume->industry!!}</li>
            <li class="list-group-item">  Зарплата: {!!$resume->salary!!} грн.</li>
            <li class="list-group-item"> Опис: {!!$resume->description!!} <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($resume->created_at))}}</h5></span></li>
        </ul>
    </div>

    <script>

        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити рєзюме?");

            if(conf) return true;

            else return false;
        }
    </script>
@stop