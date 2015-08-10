@extends('app')

@section('content')
    <ul class="nav navbar-nav navbar-right">
        <!--<li> <a href="{{$resume->id}}/destroy" >Видалити</a></li>-->
        <li> <a id="myLink" href="{{$resume->id}}/destroy" onclick="return ConfirmDelete();">Видалити</a></li>

        <li> <a href="{{$resume->id}}/edit">Редагувати</a></li>
    </ul>


    <h2>{!!$resume->position!!}</h2>
    <p>
        Дата створення :  {!!$resume->created_at!!}
    </p>
    <p>
        Ім'я :  {!!$resume->name_u!!}
    </p>
    <p>
        Позиція :  {!!$resume->position!!}
    </p>
    <p>
        Місто  :  {!!$resume->city!!}
    </p>
    <p>
        Промисловість: {!!$resume->industry!!}
    </p>
    <p>
        Зарплата: {!!$resume->salary!!} грн.
    </p>
    <p>
        Опис: {!!$resume->description!!}

    </p>

    <script>

        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити рєзюме?");

            if(conf) return true;

            else return false;
        }
    </script>
@stop