@extends('app')

@section('content')

    <div class="panel panel-orange">
        <div class="panel-heading"><h2>{{$user->name}} <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($vacancy->created_at))}}</h5></span></h2></div>
        <ul class="list-group">
            <li class="list-group-item">  <p><span class="heading"> Опис :</span>  <br> {{$vacancy->description}}</p></li>
            <li class="list-group-item">  <a href="#"{{$company->company_name}}>{{$company->company_name}}</a></li>
            <li class="list-group-item">  {{$vacancy->position}} &#183; {{$vacancy->salary}} грн</li>
            <li class="list-group-item">  @foreach($cities as $city) {{$city->name}}<br> @endforeach</li>
            <li class="list-group-item">  {{$industry->name}}</li>
            <li class="list-group-item"><a href="{{$vacancy->id}}/response">Відгукнутися</a> </li>
        </ul>
    </div>


@stop