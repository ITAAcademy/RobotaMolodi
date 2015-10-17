@extends('app')

@section('content')
    <ul class="nav navbar-nav navbar-right">
        <li> <a href="{{$vacancy->id}}/destroy" onclick="return ConfirmDelete();">Видалити</a></li>
        <li> <a href="{{$vacancy->id}}/edit">Редагувати</a></li>
    </ul>

    <div class="panel panel-orange">
        <div class="panel-heading"><h2>{{$vacancy->position}} &#183; {{$vacancy->salary}} грн</h2></div>
        <ul class="list-group">
            <li class="list-group-item">  <a target="_blank" href="@if($company->company_email != ''){{$company->company_email}} @else #@endif">{{$company->company_name}}</a>,{{$user->name}}  </li>
            <li class="list-group-item"> @foreach($cities as $city) {{$city->name}} @endforeach</li>
            <li class="list-group-item">  {{$industry->name}}</li>
            <li class="list-group-item"><span class="heading"> Опис : </span> {{$vacancy->description}} <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($vacancy->created_at))}}</h5></span></li>

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