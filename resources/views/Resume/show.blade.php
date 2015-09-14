@extends('app')

@section('content')

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"> <h2>{!!$resume->position!!}</h2></div>

        <ul class="list-group">
            <li class="list-group-item"><span class="heading"> Дата створення :    </span> {!!$resume->created_at!!}</li>
            <li class="list-group-item"><span class="heading"> Ім'я :    </span>  {!!$resume->name_u!!}</li>
            <li class="list-group-item"><span class="heading"> Позиція :     </span> {!!$resume->position!!}</li>
            <li class="list-group-item"><span class="heading"> Місто  :   </span> {!!$city->name!!}</li>
            <li class="list-group-item"><span class="heading"> Промисловість: </span> {!!$resume->Industry()->name!!}</li>
            <li class="list-group-item"><span class="heading"> Зарплата:  </span> {!!$resume->salary!!} грн.</li>
            <li class="list-group-item"><span class="heading"> Опис: </span> {!!$resume->description!!}</li>
            <li class="list-group-item"><a href="#">Написати на почту</a></li>
        </ul>
    </div>
@stop