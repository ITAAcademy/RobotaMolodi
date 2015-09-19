@extends('app')

@section('content')

    <div class="panel panel-orange">
        <div class="panel-heading"> <h2>{!!$resume->position!!}  &#183;  {!!$resume->salary!!} грн. <span class="text-muted text-right pull-right"><h5>{{ date('j.m.Y,H:i:s', strtotime($resume->created_at))}}</h5></span></h2></div>
        <ul class="list-group">
            <li class="list-group-item"> {!!$resume->name_u!!}</li>
            <li class="list-group-item">{!!$city->name!!}</li>
            <li class="list-group-item">{!!$resume->Industry()->name!!}</li>
            <li class="list-group-item"><span class="heading"> Опис: </span> {!!$resume->description!!}</li>
            <li class="list-group-item"><a href="#">Написати на почту</a></li>
        </ul>
    </div>
@stop