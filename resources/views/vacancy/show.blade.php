@extends('app')

@section('content')

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading"><h2>Перегляд вакансії</h2></div>
        <div class="panel-body">
            <p><span class="heading"> Опис :</span>  <br>          {{$vacancy->description}}</p>
        </div>

        <!-- List group -->
        <ul class="list-group">
            <li class="list-group-item"> <span class="heading">Дата розміщення :</span> {{$vacancy->created_at}}</li>
            <li class="list-group-item"><span class="heading">Компанія :</span>        <a href="#"{{$company->company_name}}>{{$company->company_name}}</a></li>
            <li class="list-group-item"><span class="heading">Зарплата :</span>        {{$vacancy->salary}}</li>
            <li class="list-group-item"><span class="heading">Позиція : </span>        {{$vacancy->position}}</li>
            <li class="list-group-item"><span class="heading">Місто : </span>          @foreach($cities as $city) {{$city->name}},<br> @endforeach</li>
            <li class="list-group-item"><span class="heading">Галузь : </span>         {{$industry->name}}</li>
            <li class="list-group-item"><span class="heading">Від кого : </span>       {{$user->name}}</li>
            <li class="list-group-item"><a href="{{$vacancy->id}}/response">Відгукнутися</a></li>
        </ul>
    </div>


@stop