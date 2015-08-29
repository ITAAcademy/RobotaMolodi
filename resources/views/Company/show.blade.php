@extends('app')

@section('content')
    <ul class="nav navbar-nav navbar-right">
        <li> <li> <a href="{{$company->id}}/destroy" onclick="return ConfirmDelete();">Видалити</a></li></li>
        <li> <a href="{{$company->id}}/edit">Редагувати</a></li>
    </ul>
    <h1>Перегляд компанії</h1>
    Назва :        {{$company->company_name}}<br>
    Поссилання :   {{$company->company_email}}<br>

    <script>
        function ConfirmDelete()
        {
            var conf = confirm("Ви дійсно хочете видалити рєзюме?");

            if(conf) return true;

            else return false;
        }
    </script>

@stop